<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Creates the check_runs table for storing uptime check results.
     * Each row represents a single health check execution.
     */
    public function up(): void
    {
        Schema::create('check_runs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('check_id')->constrained()->onDelete('cascade');
            
            // Timing
            $table->timestamp('checked_at');
            $table->unsignedInteger('response_time_ms')->nullable();
            
            // Result
            $table->unsignedSmallInteger('status_code')->nullable();
            $table->boolean('is_up');
            $table->string('error_message', 500)->nullable();
            
            // Optional details
            $table->unsignedInteger('dns_time_ms')->nullable();
            $table->unsignedInteger('connect_time_ms')->nullable();
            $table->unsignedInteger('tls_time_ms')->nullable();
            $table->unsignedInteger('ttfb_ms')->nullable(); // Time to first byte
            
            $table->timestamps();
            
            // Indexes for efficient queries
            $table->index(['check_id', 'checked_at']);
            $table->index(['check_id', 'is_up']);
            $table->index('checked_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_runs');
    }
};
