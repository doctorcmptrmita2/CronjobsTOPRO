<?php

namespace App\Services;

use App\Models\Check;
use App\Models\CheckRun;
use App\Mail\CheckDownAlertMail;
use App\Mail\CheckRecoveredMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CheckRunnerService
{
    protected TelegramService $telegram;

    public function __construct()
    {
        $this->telegram = new TelegramService();
    }
    /**
     * Run a single uptime check
     */
    public function run(Check $check): array
    {
        $startTime = microtime(true);
        $result = [
            'status_code' => null,
            'response_time_ms' => null,
            'is_up' => false,
            'error_message' => null,
        ];

        try {
            $response = Http::timeout($check->timeout_seconds)
                ->withHeaders($check->preparedHeaders())
                ->send($check->http_method, $check->url, [
                    'body' => $check->body,
                ]);

            $result['status_code'] = $response->status();
            $result['response_time_ms'] = (int) round((microtime(true) - $startTime) * 1000);

            // Check status code
            $statusOk = $result['status_code'] >= $check->expected_status_from
                && $result['status_code'] <= $check->expected_status_to;

            // Check keyword if specified
            $keywordOk = true;
            if ($check->keyword) {
                $containsKeyword = str_contains($response->body(), $check->keyword);
                $keywordOk = $check->keyword_should_exist ? $containsKeyword : !$containsKeyword;
                
                if (!$keywordOk) {
                    $result['error_message'] = $check->keyword_should_exist
                        ? "Keyword '{$check->keyword}' not found in response"
                        : "Keyword '{$check->keyword}' found in response (should not exist)";
                }
            }

            $result['is_up'] = $statusOk && $keywordOk;

            if (!$statusOk && !$result['error_message']) {
                $result['error_message'] = "Expected status {$check->expected_status_from}-{$check->expected_status_to}, got {$result['status_code']}";
            }

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            $result['response_time_ms'] = (int) round((microtime(true) - $startTime) * 1000);
            $result['error_message'] = 'Connection failed: ' . $e->getMessage();
        } catch (\Illuminate\Http\Client\RequestException $e) {
            $result['response_time_ms'] = (int) round((microtime(true) - $startTime) * 1000);
            $result['status_code'] = $e->response?->status();
            $result['error_message'] = 'Request failed: ' . $e->getMessage();
        } catch (\Exception $e) {
            $result['response_time_ms'] = (int) round((microtime(true) - $startTime) * 1000);
            $result['error_message'] = 'Error: ' . $e->getMessage();
        }

        return $result;
    }

    /**
     * Run check and update the check model
     */
    public function runAndRecord(Check $check): CheckRun
    {
        $wasUp = $check->is_up;
        $result = $this->run($check);

        // Create check run record
        $checkRun = CheckRun::create([
            'check_id' => $check->id,
            'checked_at' => now(),
            'response_time_ms' => $result['response_time_ms'],
            'status_code' => $result['status_code'],
            'is_up' => $result['is_up'],
            'error_message' => $result['error_message'],
        ]);

        // Update check status
        $check->last_checked_at = now();
        $check->last_status_code = $result['status_code'];
        $check->last_response_time_ms = $result['response_time_ms'];
        $check->is_up = $result['is_up'];
        $check->locked_at = null;

        if ($result['is_up']) {
            $check->consecutive_failures = 0;
            $check->last_up_at = now();
            
            // Send recovery notification if was down
            if (!$wasUp && $check->alert_sent) {
                $check->alert_sent = false;
                $this->sendRecoveryNotification($check);
            }
        } else {
            $check->consecutive_failures++;
            
            if (!$check->last_down_at || $wasUp) {
                $check->last_down_at = now();
            }

            // Send alert if threshold reached
            if ($check->consecutive_failures >= $check->alert_threshold && !$check->alert_sent) {
                $check->alert_sent = true;
                $this->sendDownNotification($check, $result['error_message']);
            }
        }

        // Update average response time (simple moving average of last 100)
        $recentAvg = $check->runs()
            ->whereNotNull('response_time_ms')
            ->orderByDesc('checked_at')
            ->limit(100)
            ->avg('response_time_ms');
        $check->avg_response_time_ms = $recentAvg ? (int) round($recentAvg) : null;

        // Update uptime percentage (last 24 hours)
        $check->uptime_percentage = $check->calculateUptime(24);

        $check->save();

        return $checkRun;
    }

    /**
     * Send notification when check goes down
     */
    protected function sendDownNotification(Check $check, ?string $errorMessage): void
    {
        $user = $check->user;

        // Send email notification
        if ($check->alert_email_enabled) {
            try {
                $email = $user->notification_email ?? $user->email;
                Mail::to($email)->queue(new CheckDownAlertMail($check, $errorMessage));
            } catch (\Exception $e) {
                Log::error("Failed to send check down email for check {$check->id}: " . $e->getMessage());
            }
        }

        // Send Telegram notification
        if ($user->telegram_enabled && $user->telegram_chat_id) {
            try {
                $this->telegram->sendCheckDownAlert($user, $check, $errorMessage);
            } catch (\Exception $e) {
                Log::error("Failed to send check down Telegram for check {$check->id}: " . $e->getMessage());
            }
        }
    }

    /**
     * Send notification when check recovers
     */
    protected function sendRecoveryNotification(Check $check): void
    {
        $user = $check->user;

        // Send email notification
        if ($check->alert_email_enabled) {
            try {
                $email = $user->notification_email ?? $user->email;
                Mail::to($email)->queue(new CheckRecoveredMail($check));
            } catch (\Exception $e) {
                Log::error("Failed to send check recovery email for check {$check->id}: " . $e->getMessage());
            }
        }

        // Send Telegram notification
        if ($user->telegram_enabled && $user->telegram_chat_id) {
            try {
                $this->telegram->sendCheckRecoveryAlert($user, $check);
            } catch (\Exception $e) {
                Log::error("Failed to send check recovery Telegram for check {$check->id}: " . $e->getMessage());
            }
        }
    }
}





