<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TelegramService
{
    protected string $botToken;
    protected string $apiUrl = 'https://api.telegram.org/bot';

    public function __construct()
    {
        $this->botToken = config('services.telegram.bot_token') ?? '';
    }

    /**
     * Check if Telegram is configured
     */
    public function isConfigured(): bool
    {
        return !empty($this->botToken);
    }

    /**
     * Send a message to a Telegram chat
     */
    public function sendMessage(string $chatId, string $message, array $options = []): bool
    {
        if (!$this->isConfigured()) {
            Log::warning('Telegram bot token not configured');
            return false;
        }

        try {
            $response = Http::post("{$this->apiUrl}{$this->botToken}/sendMessage", array_merge([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
            ], $options));

            if (!$response->successful()) {
                Log::error('Telegram API error', [
                    'chat_id' => $chatId,
                    'response' => $response->json(),
                ]);
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send Telegram message', [
                'chat_id' => $chatId,
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }

    /**
     * Send job failure alert
     */
    public function sendJobFailureAlert(User $user, $job, ?string $errorMessage = null): bool
    {
        if (!$user->telegram_enabled || !$user->telegram_chat_id) {
            return false;
        }

        $message = "🔴 <b>JOB FAILURE ALERT</b>\n\n";
        $message .= "Job: <b>{$job->name}</b>\n";
        $message .= "URL: <code>{$job->url}</code>\n";
        $message .= "Time: " . now()->format('M d, Y H:i:s') . " UTC\n";
        $message .= "Consecutive Failures: {$job->consecutive_failures}\n";
        
        if ($errorMessage) {
            $message .= "\n❌ Error: {$errorMessage}";
        }

        $message .= "\n\n<a href=\"" . url("/jobs/{$job->id}") . "\">View Job Details →</a>";

        return $this->sendMessage($user->telegram_chat_id, $message);
    }

    /**
     * Send job recovery alert
     */
    public function sendJobRecoveryAlert(User $user, $job): bool
    {
        if (!$user->telegram_enabled || !$user->telegram_chat_id) {
            return false;
        }

        $message = "✅ <b>JOB RECOVERED</b>\n\n";
        $message .= "Job: <b>{$job->name}</b>\n";
        $message .= "URL: <code>{$job->url}</code>\n";
        $message .= "Time: " . now()->format('M d, Y H:i:s') . " UTC\n";
        $message .= "Status: Back to normal\n";
        $message .= "\n<a href=\"" . url("/jobs/{$job->id}") . "\">View Job Details →</a>";

        return $this->sendMessage($user->telegram_chat_id, $message);
    }

    /**
     * Send check down alert
     */
    public function sendCheckDownAlert(User $user, $check, ?string $errorMessage = null): bool
    {
        if (!$user->telegram_enabled || !$user->telegram_chat_id) {
            return false;
        }

        $message = "🔴 <b>ENDPOINT DOWN</b>\n\n";
        $message .= "Monitor: <b>{$check->name}</b>\n";
        $message .= "URL: <code>{$check->url}</code>\n";
        $message .= "Time: " . now()->format('M d, Y H:i:s') . " UTC\n";
        
        if ($check->last_status_code) {
            $message .= "Status Code: {$check->last_status_code}\n";
        }
        
        $message .= "Consecutive Failures: {$check->consecutive_failures}\n";
        
        if ($errorMessage) {
            $message .= "\n❌ Error: {$errorMessage}";
        }

        $message .= "\n\n<a href=\"" . url("/uptime/{$check->id}") . "\">View Check Details →</a>";

        return $this->sendMessage($user->telegram_chat_id, $message);
    }

    /**
     * Send check recovery alert
     */
    public function sendCheckRecoveryAlert(User $user, $check): bool
    {
        if (!$user->telegram_enabled || !$user->telegram_chat_id) {
            return false;
        }

        $message = "✅ <b>ENDPOINT RECOVERED</b>\n\n";
        $message .= "Monitor: <b>{$check->name}</b>\n";
        $message .= "URL: <code>{$check->url}</code>\n";
        $message .= "Time: " . now()->format('M d, Y H:i:s') . " UTC\n";
        
        if ($check->last_response_time_ms) {
            $message .= "Response Time: {$check->last_response_time_ms}ms\n";
        }
        
        $message .= "Status: Back online\n";
        $message .= "\n<a href=\"" . url("/uptime/{$check->id}") . "\">View Check Details →</a>";

        return $this->sendMessage($user->telegram_chat_id, $message);
    }

    /**
     * Send login alert
     */
    public function sendLoginAlert(User $user, $loginHistory): bool
    {
        if (!$user->telegram_enabled || !$user->telegram_chat_id) {
            return false;
        }

        $emoji = $loginHistory->is_suspicious ? '⚠️' : '🔐';
        $title = $loginHistory->is_suspicious ? 'SUSPICIOUS LOGIN' : 'NEW LOGIN';

        $message = "{$emoji} <b>{$title}</b>\n\n";
        $message .= "Account: {$user->email}\n";
        $message .= "Time: {$loginHistory->logged_in_at->format('M d, Y H:i:s')} UTC\n";
        $message .= "Location: {$loginHistory->location}\n";
        $message .= "IP: <code>{$loginHistory->ip_address}</code>\n";
        $message .= "Device: {$loginHistory->browser} on {$loginHistory->platform}\n";

        if ($loginHistory->is_suspicious) {
            $message .= "\n⚠️ <b>If this wasn't you, change your password immediately!</b>";
        }

        $message .= "\n\n<a href=\"" . url("/settings/login-history") . "\">View Login History →</a>";

        return $this->sendMessage($user->telegram_chat_id, $message);
    }

    /**
     * Generate verification code for user
     */
    public function generateVerificationCode(User $user): string
    {
        $code = strtoupper(Str::random(6));
        $user->update(['telegram_verification_code' => $code]);
        return $code;
    }

    /**
     * Verify user's Telegram account
     */
    public function verifyUser(string $code, string $chatId, ?string $username = null): ?User
    {
        $user = User::where('telegram_verification_code', $code)->first();

        if (!$user) {
            return null;
        }

        $user->update([
            'telegram_chat_id' => $chatId,
            'telegram_username' => $username,
            'telegram_enabled' => true,
            'telegram_verification_code' => null,
            'telegram_verified_at' => now(),
        ]);

        // Send welcome message
        $this->sendMessage($chatId, 
            "✅ <b>Telegram Connected Successfully!</b>\n\n" .
            "Your Cronjobs.to account ({$user->email}) is now linked to this Telegram account.\n\n" .
            "You will receive alerts for:\n" .
            "• Job failures and recoveries\n" .
            "• Uptime monitor alerts\n" .
            "• Security notifications\n\n" .
            "Manage your settings at:\n" .
            url("/settings/notifications")
        );

        return $user;
    }

    /**
     * Disconnect Telegram from user account
     */
    public function disconnect(User $user): bool
    {
        if ($user->telegram_chat_id) {
            $this->sendMessage($user->telegram_chat_id,
                "🔌 <b>Telegram Disconnected</b>\n\n" .
                "Your Cronjobs.to account has been unlinked from this Telegram account.\n\n" .
                "You will no longer receive alerts here."
            );
        }

        $user->update([
            'telegram_chat_id' => null,
            'telegram_username' => null,
            'telegram_enabled' => false,
            'telegram_verification_code' => null,
            'telegram_verified_at' => null,
        ]);

        return true;
    }

    /**
     * Get bot info
     */
    public function getBotInfo(): ?array
    {
        if (!$this->isConfigured()) {
            return null;
        }

        try {
            $response = Http::get("{$this->apiUrl}{$this->botToken}/getMe");
            
            if ($response->successful()) {
                return $response->json()['result'] ?? null;
            }
        } catch (\Exception $e) {
            Log::error('Failed to get Telegram bot info', ['error' => $e->getMessage()]);
        }

        return null;
    }

    /**
     * Set webhook URL for the bot
     */
    public function setWebhook(string $url): bool
    {
        if (!$this->isConfigured()) {
            return false;
        }

        try {
            $response = Http::post("{$this->apiUrl}{$this->botToken}/setWebhook", [
                'url' => $url,
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Failed to set Telegram webhook', ['error' => $e->getMessage()]);
            return false;
        }
    }
}

