<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobRun;
use App\Mail\JobFailedMail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

/**
 * Handles heartbeat ping endpoints.
 * 
 * Heartbeat monitoring works in reverse to cron monitoring:
 * - Cron: We call the customer's endpoint on schedule
 * - Heartbeat: Customer calls our endpoint to signal they're alive
 * 
 * If we don't receive a ping within the expected interval + grace period,
 * we mark the job as failed and send alerts.
 */
class HeartbeatController extends Controller
{
    /**
     * Receive a heartbeat ping.
     * 
     * Supports multiple HTTP methods (GET, POST, HEAD) for flexibility.
     * Returns JSON with job status information.
     * 
     * Usage: GET/POST /ping/{token}
     * Optional query params: ?msg=custom_message
     */
    public function ping(Request $request, string $token): JsonResponse
    {
        $job = Job::where('heartbeat_token', $token)
            ->where('type', Job::TYPE_HEARTBEAT)
            ->first();

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid heartbeat token',
            ], 404);
        }

        // Check if job is active
        if (!$job->is_active) {
            return response()->json([
                'status' => 'paused',
                'message' => 'Heartbeat job is paused',
                'job' => $job->name,
            ], 200);
        }

        // Calculate time since last ping
        $previousPing = $job->last_ping_at;
        $wasOverdue = $job->isHeartbeatOverdue();

        // Update last ping timestamp
        $job->update([
            'last_ping_at' => now(),
            'consecutive_failures' => 0, // Reset on successful ping
            'last_error_message' => null,
        ]);

        // Create a job run record for tracking
        $message = $request->input('msg', 'Heartbeat received');
        
        JobRun::create([
            'job_id' => $job->id,
            'ran_at' => now(),
            'status_code' => 200,
            'success' => true,
            'response_snippet' => $message,
            'duration_ms' => 0,
        ]);

        // If it was overdue and now recovered, send recovery notification
        if ($wasOverdue && $job->alert_email_enabled) {
            $this->sendRecoveryNotification($job);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Heartbeat received',
            'job' => $job->name,
            'interval' => $job->heartbeat_interval,
            'next_expected' => now()->addMinutes($job->heartbeat_interval)->toIso8601String(),
            'previous_ping' => $previousPing?->toIso8601String(),
        ]);
    }

    /**
     * Get heartbeat job status (without recording a ping).
     * 
     * Useful for monitoring dashboards to check job status
     * without affecting the heartbeat timing.
     */
    public function status(string $token): JsonResponse
    {
        $job = Job::where('heartbeat_token', $token)
            ->where('type', Job::TYPE_HEARTBEAT)
            ->first();

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid heartbeat token',
            ], 404);
        }

        return response()->json([
            'status' => $job->heartbeat_status,
            'job' => $job->name,
            'is_active' => $job->is_active,
            'interval' => $job->heartbeat_interval,
            'grace' => $job->effective_grace,
            'last_ping' => $job->last_ping_at?->toIso8601String(),
            'next_expected' => $job->last_ping_at 
                ? $job->last_ping_at->addMinutes($job->heartbeat_interval)->toIso8601String()
                : null,
            'is_overdue' => $job->isHeartbeatOverdue(),
        ]);
    }

    /**
     * Send recovery notification when heartbeat resumes after being overdue.
     */
    protected function sendRecoveryNotification(Job $job): void
    {
        try {
            // We could create a dedicated recovery mail, but for now reuse structure
            // TODO: Create HeartbeatRecoveredMail
            Mail::to($job->user->email)->queue(new \App\Mail\JobRecoveredMail($job));
        } catch (\Exception $e) {
            \Log::error("Failed to send heartbeat recovery notification for job {$job->id}: " . $e->getMessage());
        }
    }
}


