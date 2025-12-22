<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'check_id',
        'type',
        'method',
        'endpoint',
        'ip_address',
        'user_agent',
        'headers',
        'request_body',
        'status_code',
        'response_body',
        'duration_ms',
        'success',
        'error_message',
        'logged_at',
    ];

    protected $casts = [
        'headers' => 'array',
        'success' => 'boolean',
        'logged_at' => 'datetime',
    ];

    // Types
    const TYPE_WEBHOOK = 'webhook';
    const TYPE_HEARTBEAT = 'heartbeat';
    const TYPE_API = 'api';
    const TYPE_JOB_RUN = 'job_run';
    const TYPE_CHECK_RUN = 'check_run';

    /**
     * Get the user that owns the log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the job associated with the log.
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the check associated with the log.
     */
    public function check(): BelongsTo
    {
        return $this->belongsTo(Check::class);
    }

    /**
     * Log a request
     */
    public static function log(array $data): self
    {
        return self::create(array_merge($data, [
            'logged_at' => now(),
        ]));
    }

    /**
     * Log a webhook request
     */
    public static function logWebhook(
        int $userId,
        ?int $jobId,
        string $method,
        string $endpoint,
        ?string $ipAddress = null,
        ?string $userAgent = null,
        ?array $headers = null,
        ?string $requestBody = null,
        int $statusCode = 200,
        bool $success = true,
        ?string $errorMessage = null
    ): self {
        return self::log([
            'user_id' => $userId,
            'job_id' => $jobId,
            'type' => self::TYPE_WEBHOOK,
            'method' => $method,
            'endpoint' => $endpoint,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'headers' => $headers,
            'request_body' => $requestBody,
            'status_code' => $statusCode,
            'success' => $success,
            'error_message' => $errorMessage,
        ]);
    }

    /**
     * Log a heartbeat request
     */
    public static function logHeartbeat(
        int $userId,
        int $jobId,
        string $endpoint,
        ?string $ipAddress = null,
        int $statusCode = 200,
        bool $success = true
    ): self {
        return self::log([
            'user_id' => $userId,
            'job_id' => $jobId,
            'type' => self::TYPE_HEARTBEAT,
            'method' => 'GET',
            'endpoint' => $endpoint,
            'ip_address' => $ipAddress,
            'status_code' => $statusCode,
            'success' => $success,
        ]);
    }

    /**
     * Get type label
     */
    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            self::TYPE_WEBHOOK => 'Webhook',
            self::TYPE_HEARTBEAT => 'Heartbeat',
            self::TYPE_API => 'API',
            self::TYPE_JOB_RUN => 'Job Run',
            self::TYPE_CHECK_RUN => 'Check Run',
            default => ucfirst($this->type),
        };
    }

    /**
     * Get type badge class
     */
    public function getTypeBadgeClassAttribute(): string
    {
        return match ($this->type) {
            self::TYPE_WEBHOOK => 'badge-info',
            self::TYPE_HEARTBEAT => 'badge-success',
            self::TYPE_API => 'badge-warning',
            self::TYPE_JOB_RUN => 'badge-primary',
            self::TYPE_CHECK_RUN => 'badge-secondary',
            default => 'badge-neutral',
        };
    }
}
