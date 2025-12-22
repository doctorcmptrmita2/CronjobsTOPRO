<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ApiToken;
use App\Models\Job;
use App\Models\JobRun;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone',
        'locale',
        'notification_email',
        'login_alerts_enabled',
        'telegram_chat_id',
        'telegram_username',
        'telegram_enabled',
        'telegram_verification_code',
        'telegram_verified_at',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'plan_id',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'login_alerts_enabled' => 'boolean',
            'telegram_enabled' => 'boolean',
            'telegram_verified_at' => 'datetime',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    /**
     * Check if user has 2FA enabled
     */
    public function hasTwoFactorEnabled(): bool
    {
        return $this->two_factor_confirmed_at !== null;
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function apiToken(): HasOne
    {
        return $this->hasOne(ApiToken::class);
    }

    public function jobRuns(): HasManyThrough
    {
        return $this->hasManyThrough(JobRun::class, Job::class);
    }

    public function statusPages(): HasMany
    {
        return $this->hasMany(StatusPage::class);
    }

    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }

    public function loginHistories(): HasMany
    {
        return $this->hasMany(LoginHistory::class);
    }
}
