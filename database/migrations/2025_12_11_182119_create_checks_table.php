<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Creates the checks table for uptime monitoring.
     * Checks are periodic health checks that run at fixed intervals (30s-5min)
     * to monitor endpoint availability and response times.
     */
    public function up(): void
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Basic info
            $table->string('name');
            $table->string('url');
            $table->enum('http_method', ['GET', 'HEAD', 'POST'])->default('GET');
            
            // Check configuration
            $table->unsignedInteger('interval_seconds')->default(60); // min: 30, max: 300
            $table->unsignedInteger('timeout_seconds')->default(30);
            $table->unsignedSmallInteger('expected_status_from')->default(200);
            $table->unsignedSmallInteger('expected_status_to')->default(299);
            
            // Optional settings
            $table->json('headers_json')->nullable();
            $table->text('body')->nullable();
            $table->string('keyword')->nullable(); // Check if response contains this
            $table->boolean('keyword_should_exist')->default(true);
            
            // Status tracking
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_checked_at')->nullable();
            $table->unsignedSmallInteger('last_status_code')->nullable();
            $table->unsignedInteger('last_response_time_ms')->nullable();
            $table->boolean('is_up')->default(true);
            $table->timestamp('last_down_at')->nullable();
            $table->timestamp('last_up_at')->nullable();
            
            // Calculated metrics (updated periodically)
            $table->decimal('uptime_percentage', 5, 2)->default(100.00);
            $table->unsignedInteger('avg_response_time_ms')->nullable();
            $table->unsignedInteger('consecutive_failures')->default(0);
            
            // Alerting
            $table->boolean('alert_email_enabled')->default(true);
            $table->unsignedTinyInteger('alert_threshold')->default(2); // failures before alert
            $table->boolean('alert_sent')->default(false);
            
            // For distributed checking (future)
            $table->timestamp('locked_at')->nullable();
            
            $table->timestamps();
            
            // Indexes
            $table->index(['user_id', 'is_active']);
            $table->index(['is_active', 'last_checked_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
