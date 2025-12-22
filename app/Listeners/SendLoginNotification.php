<?php

namespace App\Listeners;

use App\Mail\NewLoginAlertMail;
use App\Models\LoginHistory;
use App\Services\TelegramService;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendLoginNotification implements ShouldQueue
{
    use InteractsWithQueue;

    protected TelegramService $telegram;

    public function __construct()
    {
        $this->telegram = new TelegramService();
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        $request = request();

        $ipAddress = $request->ip();
        $userAgent = $request->userAgent() ?? 'Unknown';

        // Parse user agent
        $deviceInfo = LoginHistory::parseUserAgent($userAgent);

        // Check if new device or location
        $isNewDevice = LoginHistory::isNewDeviceForUser($user->id, $userAgent);
        $isNewLocation = LoginHistory::isNewLocationForUser($user->id, $ipAddress);
        $isSuspicious = $isNewDevice && $isNewLocation;

        // Get location from IP (basic - can be enhanced with GeoIP service)
        $location = $this->getLocationFromIp($ipAddress);

        // Create login history record
        $loginHistory = LoginHistory::create([
            'user_id' => $user->id,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'device_type' => $deviceInfo['device_type'],
            'browser' => $deviceInfo['browser'],
            'platform' => $deviceInfo['platform'],
            'location' => $location['location'],
            'country_code' => $location['country_code'],
            'is_new_device' => $isNewDevice,
            'is_new_location' => $isNewLocation,
            'is_suspicious' => $isSuspicious,
            'notification_sent' => false,
            'logged_in_at' => now(),
        ]);

        // Send notification if enabled and (new device or suspicious)
        if ($user->login_alerts_enabled && ($isNewDevice || $isSuspicious)) {
            // Send email notification
            try {
                $email = $user->notification_email ?? $user->email;
                Mail::to($email)->queue(new NewLoginAlertMail($user, $loginHistory));
                $loginHistory->update(['notification_sent' => true]);
            } catch (\Exception $e) {
                Log::error("Failed to send login email for user {$user->id}: " . $e->getMessage());
            }

            // Send Telegram notification
            if ($user->telegram_enabled && $user->telegram_chat_id) {
                try {
                    $this->telegram->sendLoginAlert($user, $loginHistory);
                } catch (\Exception $e) {
                    Log::error("Failed to send login Telegram for user {$user->id}: " . $e->getMessage());
                }
            }
        }
    }

    /**
     * Get location from IP address.
     * This is a basic implementation - can be enhanced with GeoIP services.
     */
    protected function getLocationFromIp(string $ipAddress): array
    {
        // For localhost/private IPs
        if (in_array($ipAddress, ['127.0.0.1', '::1']) || 
            preg_match('/^(10\.|172\.(1[6-9]|2[0-9]|3[01])\.|192\.168\.)/', $ipAddress)) {
            return [
                'location' => 'Local Network',
                'country_code' => null,
            ];
        }

        // Try to get location from free IP API (optional - can fail silently)
        try {
            $response = @file_get_contents("http://ip-api.com/json/{$ipAddress}?fields=city,country,countryCode");
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data['city']) && isset($data['country'])) {
                    return [
                        'location' => "{$data['city']}, {$data['country']}",
                        'country_code' => $data['countryCode'] ?? null,
                    ];
                }
            }
        } catch (\Exception $e) {
            // Silently fail
        }

        return [
            'location' => 'Unknown',
            'country_code' => null,
        ];
    }
}
