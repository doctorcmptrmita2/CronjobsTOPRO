<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'url',
        'http_method',
        'interval_seconds',
        'timeout_seconds',
        'expected_status_from',
        'expected_status_to',
        'headers_json',
        'body',
        'keyword',
        'keyword_should_exist',
        'is_active',
        'last_checked_at',
        'last_status_code',
        'last_response_time_ms',
        'is_up',
        'last_down_at',
        'last_up_at',
        'uptime_percentage',
        'avg_response_time_ms',
        'consecutive_failures',
        'alert_email_enabled',
        'alert_threshold',
        'alert_sent',
        'locked_at',
    ];

    protected $casts = [
        'headers_json' => 'array',
        'is_active' => 'boolean',
        'is_up' => 'boolean',
        'keyword_should_exist' => 'boolean',
        'alert_email_enabled' => 'boolean',
        'alert_sent' => 'boolean',
        'last_checked_at' => 'datetime',
        'last_down_at' => 'datetime',
        'last_up_at' => 'datetime',
        'locked_at' => 'datetime',
        'interval_seconds' => 'integer',
        'timeout_seconds' => 'integer',
        'expected_status_from' => 'integer',
        'expected_status_to' => 'integer',
        'last_status_code' => 'integer',
        'last_response_time_ms' => 'integer',
        'avg_response_time_ms' => 'integer',
        'consecutive_failures' => 'integer',
        'alert_threshold' => 'integer',
        'uptime_percentage' => 'decimal:2',
    ];

    // Interval options in seconds
    const INTERVALS = [
        30 => '30 seconds',
        60 => '1 minute',
        120 => '2 minutes',
        300 => '5 minutes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function runs(): HasMany
    {
        return $this->hasMany(CheckRun::class);
    }

    /**
     * Get prepared headers for HTTP request
     */
    public function preparedHeaders(): array
    {
        $headers = $this->headers_json ?? [];

        return collect($headers)
            ->filter(fn ($value, $key) => filled($key) && filled($value))
            ->mapWithKeys(fn ($value, $key) => [trim($key) => trim($value)])
            ->all();
    }

    /**
     * Check if this check is due to run
     */
    public function isDue(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if (!$this->last_checked_at) {
            return true;
        }

        return $this->last_checked_at->addSeconds($this->interval_seconds)->isPast();
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        if (!$this->is_active) {
            return 'gray';
        }

        return $this->is_up ? 'emerald' : 'red';
    }

    /**
     * Get status text
     */
    public function getStatusTextAttribute(): string
    {
        if (!$this->is_active) {
            return 'Paused';
        }

        return $this->is_up ? 'Up' : 'Down';
    }

    /**
     * Get human readable interval
     */
    public function getIntervalTextAttribute(): string
    {
        return self::INTERVALS[$this->interval_seconds] ?? "{$this->interval_seconds}s";
    }

    /**
     * Get response time badge color
     */
    public function getResponseTimeColorAttribute(): string
    {
        if (!$this->last_response_time_ms) {
            return 'gray';
        }

        if ($this->last_response_time_ms < 200) {
            return 'emerald';
        } elseif ($this->last_response_time_ms < 500) {
            return 'green';
        } elseif ($this->last_response_time_ms < 1000) {
            return 'amber';
        } else {
            return 'red';
        }
    }

    /**
     * Get uptime badge color
     */
    public function getUptimeColorAttribute(): string
    {
        if ($this->uptime_percentage >= 99.9) {
            return 'emerald';
        } elseif ($this->uptime_percentage >= 99) {
            return 'green';
        } elseif ($this->uptime_percentage >= 95) {
            return 'amber';
        } else {
            return 'red';
        }
    }

    /**
     * Calculate uptime percentage for a given period
     */
    public function calculateUptime(int $hours = 24): float
    {
        $since = now()->subHours($hours);
        
        $runs = $this->runs()
            ->where('checked_at', '>=', $since)
            ->get();

        if ($runs->isEmpty()) {
            return 100.00;
        }

        $upCount = $runs->where('is_up', true)->count();
        
        return round(($upCount / $runs->count()) * 100, 2);
    }

    /**
     * Get downtime duration if currently down
     */
    public function getDowntimeDurationAttribute(): ?string
    {
        if ($this->is_up || !$this->last_down_at) {
            return null;
        }

        return $this->last_down_at->diffForHumans(now(), ['parts' => 2, 'short' => true]);
    }

    /**
     * Scope for due checks
     */
    public function scopeDue($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('last_checked_at')
                    ->orWhereRaw('last_checked_at <= NOW() - INTERVAL interval_seconds SECOND');
            })
            ->whereNull('locked_at');
    }

    /**
     * Get next check time
     */
    public function getNextCheckAtAttribute(): ?Carbon
    {
        if (!$this->is_active) {
            return null;
        }

        if (!$this->last_checked_at) {
            return now();
        }

        return $this->last_checked_at->addSeconds($this->interval_seconds);
    }
}
