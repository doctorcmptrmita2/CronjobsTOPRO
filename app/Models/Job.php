<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    // Job types
    const TYPE_CRON = 'cron';
    const TYPE_HEARTBEAT = 'heartbeat';

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'description',
        'url',
        'http_method',
        'headers_json',
        'body',
        'timeout_seconds',
        'expected_status_from',
        'expected_status_to',
        'schedule_type',
        'interval_minutes',
        'daily_time',
        'weekly_day_of_week',
        'cron_expression',
        'timezone',
        'is_active',
        'max_retries',
        'failure_alert_threshold',
        'alert_email_enabled',
        'last_run_at',
        'next_run_at',
        'last_status_code',
        'last_duration_ms',
        'last_error_message',
        'consecutive_failures',
        'locked_at',
        // Heartbeat specific
        'heartbeat_token',
        'heartbeat_interval',
        'heartbeat_grace',
        'last_ping_at',
    ];

    protected $casts = [
        'headers_json' => 'array',
        'is_active' => 'boolean',
        'alert_email_enabled' => 'boolean',
        'last_run_at' => 'datetime',
        'next_run_at' => 'datetime',
        'locked_at' => 'datetime',
        'last_ping_at' => 'datetime',
        'interval_minutes' => 'integer',
        'timeout_seconds' => 'integer',
        'expected_status_from' => 'integer',
        'expected_status_to' => 'integer',
        'max_retries' => 'integer',
        'failure_alert_threshold' => 'integer',
        'weekly_day_of_week' => 'integer',
        'heartbeat_interval' => 'integer',
        'heartbeat_grace' => 'integer',
        'last_status_code' => 'integer',
        'last_duration_ms' => 'integer',
        'consecutive_failures' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function runs(): HasMany
    {
        return $this->hasMany(JobRun::class);
    }

    public function preparedHeaders(): array
    {
        $headers = $this->headers_json ?? [];

        return collect($headers)
            ->filter(fn ($value, $key) => filled($key) && filled($value))
            ->mapWithKeys(fn ($value, $key) => [trim($key) => trim($value)])
            ->all();
    }

    /**
     * Check if this is a heartbeat job
     */
    public function isHeartbeat(): bool
    {
        return $this->type === self::TYPE_HEARTBEAT;
    }

    /**
     * Check if this is a cron job
     */
    public function isCron(): bool
    {
        return $this->type === self::TYPE_CRON;
    }

    /**
     * Generate a unique heartbeat token
     */
    public static function generateHeartbeatToken(): string
    {
        do {
            $token = bin2hex(random_bytes(16)); // 32 char hex string
        } while (self::where('heartbeat_token', $token)->exists());
        
        return $token;
    }

    /**
     * Get the ping URL for heartbeat jobs
     */
    public function getPingUrlAttribute(): ?string
    {
        if (!$this->isHeartbeat() || !$this->heartbeat_token) {
            return null;
        }
        
        return url("/ping/{$this->heartbeat_token}");
    }

    /**
     * Get effective grace period (default: interval * 1.5)
     */
    public function getEffectiveGraceAttribute(): int
    {
        if ($this->heartbeat_grace) {
            return $this->heartbeat_grace;
        }
        
        // Default grace: interval + 50%
        return (int) ceil(($this->heartbeat_interval ?? 5) * 1.5);
    }

    /**
     * Check if heartbeat is overdue (missed expected ping)
     */
    public function isHeartbeatOverdue(): bool
    {
        if (!$this->isHeartbeat() || !$this->is_active) {
            return false;
        }

        // Never received a ping - check against created_at + grace
        if (!$this->last_ping_at) {
            $deadline = $this->created_at->addMinutes($this->effective_grace);
            return now()->gt($deadline);
        }

        // Check if last ping + interval + grace has passed
        $deadline = $this->last_ping_at->addMinutes($this->heartbeat_interval + $this->effective_grace);
        return now()->gt($deadline);
    }

    /**
     * Get heartbeat status: healthy, warning, critical
     */
    public function getHeartbeatStatusAttribute(): string
    {
        if (!$this->isHeartbeat()) {
            return 'n/a';
        }

        if (!$this->is_active) {
            return 'paused';
        }

        if (!$this->last_ping_at) {
            // Never pinged - waiting
            $deadline = $this->created_at->addMinutes($this->effective_grace);
            return now()->gt($deadline) ? 'critical' : 'waiting';
        }

        $minutesSinceLastPing = $this->last_ping_at->diffInMinutes(now());
        $interval = $this->heartbeat_interval;
        $grace = $this->effective_grace;

        if ($minutesSinceLastPing <= $interval) {
            return 'healthy';
        } elseif ($minutesSinceLastPing <= $interval + $grace) {
            return 'warning';
        } else {
            return 'critical';
        }
    }

    /**
     * Get schedule summary including heartbeat
     */
    public function getScheduleSummaryAttribute(): string
    {
        if ($this->isHeartbeat()) {
            return "Heartbeat every {$this->heartbeat_interval} min";
        }

        return match ($this->schedule_type) {
            'interval' => "Every {$this->interval_minutes} min",
            'daily' => "Daily at {$this->daily_time}",
            'weekly' => "Weekly on " . Carbon::now()->startOfWeek(Carbon::SUNDAY)->addDays((int) $this->weekly_day_of_week)->format('D') . " at {$this->daily_time}",
            'cron' => $this->cron_expression,
            default => 'Not scheduled',
        };
    }
}
