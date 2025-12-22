<?php

namespace App\Jobs;

use App\Mail\JobFailureAlertMail;
use App\Mail\JobRecoveredMail;
use App\Models\Job;
use App\Models\JobRun;
use App\Services\JobRunnerService;
use App\Services\JobSchedulerService;
use App\Services\TelegramService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RunJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 1;

    public function __construct(public int $jobId)
    {
    }

    public function handle(JobRunnerService $runnerService, JobSchedulerService $schedulerService): void
    {
        $job = Job::with('user')->find($this->jobId);

        if (!$job || !$job->is_active) {
            if ($job) {
                $job->locked_at = null;
                $job->save();
            }

            return;
        }

        $now = now();
        $previousFailures = $job->consecutive_failures;
        $wasInFailState = $previousFailures >= $job->failure_alert_threshold;

        $result = $runnerService->run($job);

        JobRun::create([
            'job_id' => $job->id,
            'ran_at' => $now,
            'status_code' => $result['status_code'],
            'duration_ms' => $result['duration_ms'],
            'success' => $result['success'],
            'error_message' => $result['error_message'],
            'response_snippet' => $result['response_snippet'],
        ]);

        $job->last_run_at = $now;
        $job->last_status_code = $result['status_code'];
        $job->last_duration_ms = $result['duration_ms'];
        $job->last_error_message = $result['error_message'];
        $job->consecutive_failures = $result['success'] ? 0 : $previousFailures + 1;
        $job->next_run_at = $schedulerService->calculateNextRun($job, $now);
        $job->locked_at = null;
        $job->save();

        if (!$result['success']) {
            $this->sendFailureAlertIfNeeded($job, $previousFailures);
        } elseif ($wasInFailState) {
            // Job recovered from failure state
            $this->sendRecoveryAlert($job);
        }
    }

    protected function sendFailureAlertIfNeeded(Job $job, int $previousFailures): void
    {
        if ($job->consecutive_failures < $job->failure_alert_threshold) {
            return;
        }

        if ($previousFailures >= $job->failure_alert_threshold) {
            return;
        }

        $hadSuccessBefore = JobRun::where('job_id', $job->id)
            ->where('success', true)
            ->exists();

        if (! $hadSuccessBefore) {
            return;
        }

        $user = $job->user;

        // Send email notification
        if ($job->alert_email_enabled) {
            $userEmail = $user->notification_email ?? $user->email;
            if ($userEmail) {
                try {
                    Mail::to($userEmail)->queue(new JobFailureAlertMail($job));
                } catch (\Exception $e) {
                    Log::error("Failed to send job failure email for job {$job->id}: " . $e->getMessage());
                }
            }
        }

        // Send Telegram notification
        if ($user->telegram_enabled && $user->telegram_chat_id) {
            try {
                $telegram = new TelegramService();
                $telegram->sendJobFailureAlert($user, $job, $job->last_error_message);
            } catch (\Exception $e) {
                Log::error("Failed to send job failure Telegram for job {$job->id}: " . $e->getMessage());
            }
        }
    }

    protected function sendRecoveryAlert(Job $job): void
    {
        $user = $job->user;

        // Send email notification
        if ($job->alert_email_enabled) {
            $userEmail = $user->notification_email ?? $user->email;
            if ($userEmail) {
                try {
                    Mail::to($userEmail)->queue(new JobRecoveredMail($job));
                } catch (\Exception $e) {
                    Log::error("Failed to send job recovery email for job {$job->id}: " . $e->getMessage());
                }
            }
        }

        // Send Telegram notification
        if ($user->telegram_enabled && $user->telegram_chat_id) {
            try {
                $telegram = new TelegramService();
                $telegram->sendJobRecoveryAlert($user, $job);
            } catch (\Exception $e) {
                Log::error("Failed to send job recovery Telegram for job {$job->id}: " . $e->getMessage());
            }
        }
    }
}
