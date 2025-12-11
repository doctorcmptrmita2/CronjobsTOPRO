<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_id',
        'checked_at',
        'response_time_ms',
        'status_code',
        'is_up',
        'error_message',
        'dns_time_ms',
        'connect_time_ms',
        'tls_time_ms',
        'ttfb_ms',
    ];

    protected $casts = [
        'checked_at' => 'datetime',
        'is_up' => 'boolean',
        'response_time_ms' => 'integer',
        'status_code' => 'integer',
        'dns_time_ms' => 'integer',
        'connect_time_ms' => 'integer',
        'tls_time_ms' => 'integer',
        'ttfb_ms' => 'integer',
    ];

    public function check(): BelongsTo
    {
        return $this->belongsTo(Check::class);
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return $this->is_up ? 'emerald' : 'red';
    }

    /**
     * Get response time badge color
     */
    public function getResponseTimeColorAttribute(): string
    {
        if (!$this->response_time_ms) {
            return 'gray';
        }

        if ($this->response_time_ms < 200) {
            return 'emerald';
        } elseif ($this->response_time_ms < 500) {
            return 'green';
        } elseif ($this->response_time_ms < 1000) {
            return 'amber';
        } else {
            return 'red';
        }
    }
}
