<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'device_type',
        'browser',
        'platform',
        'location',
        'country_code',
        'is_new_device',
        'is_new_location',
        'is_suspicious',
        'notification_sent',
        'logged_in_at',
    ];

    protected $casts = [
        'is_new_device' => 'boolean',
        'is_new_location' => 'boolean',
        'is_suspicious' => 'boolean',
        'notification_sent' => 'boolean',
        'logged_in_at' => 'datetime',
    ];

    /**
     * Get the user that owns the login history.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a unique device fingerprint from user agent and other data.
     */
    public static function generateDeviceFingerprint(string $userAgent, string $ipAddress): string
    {
        // Simple fingerprint based on user agent
        return hash('sha256', $userAgent);
    }

    /**
     * Check if this is a new device for the user.
     */
    public static function isNewDeviceForUser(int $userId, string $userAgent): bool
    {
        $fingerprint = self::generateDeviceFingerprint($userAgent, '');
        
        return !self::where('user_id', $userId)
            ->whereRaw("SHA2(user_agent, 256) = ?", [$fingerprint])
            ->exists();
    }

    /**
     * Check if this is a new location for the user.
     */
    public static function isNewLocationForUser(int $userId, string $ipAddress): bool
    {
        return !self::where('user_id', $userId)
            ->where('ip_address', $ipAddress)
            ->exists();
    }

    /**
     * Parse user agent to extract device info.
     */
    public static function parseUserAgent(string $userAgent): array
    {
        $deviceType = 'desktop';
        $browser = 'Unknown';
        $platform = 'Unknown';

        // Detect device type
        if (preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $userAgent)) {
            $deviceType = preg_match('/iPad|Tablet/i', $userAgent) ? 'tablet' : 'mobile';
        }

        // Detect browser
        if (preg_match('/Firefox/i', $userAgent)) {
            $browser = 'Firefox';
        } elseif (preg_match('/Edg/i', $userAgent)) {
            $browser = 'Microsoft Edge';
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            $browser = 'Chrome';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $browser = 'Safari';
        } elseif (preg_match('/Opera|OPR/i', $userAgent)) {
            $browser = 'Opera';
        } elseif (preg_match('/MSIE|Trident/i', $userAgent)) {
            $browser = 'Internet Explorer';
        }

        // Detect platform
        if (preg_match('/Windows NT 10/i', $userAgent)) {
            $platform = 'Windows 10/11';
        } elseif (preg_match('/Windows/i', $userAgent)) {
            $platform = 'Windows';
        } elseif (preg_match('/Macintosh|Mac OS/i', $userAgent)) {
            $platform = 'macOS';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            $platform = 'Linux';
        } elseif (preg_match('/iPhone/i', $userAgent)) {
            $platform = 'iOS (iPhone)';
        } elseif (preg_match('/iPad/i', $userAgent)) {
            $platform = 'iOS (iPad)';
        } elseif (preg_match('/Android/i', $userAgent)) {
            $platform = 'Android';
        }

        return [
            'device_type' => $deviceType,
            'browser' => $browser,
            'platform' => $platform,
        ];
    }

    /**
     * Get formatted logged in time.
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->logged_in_at->format('M d, Y H:i:s');
    }

    /**
     * Get device info summary.
     */
    public function getDeviceSummaryAttribute(): string
    {
        $parts = array_filter([$this->browser, $this->platform]);
        return implode(' on ', $parts) ?: 'Unknown device';
    }
}
