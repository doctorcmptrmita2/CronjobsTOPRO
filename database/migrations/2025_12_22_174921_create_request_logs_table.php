<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('check_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('type', 50); // webhook, heartbeat, api, job_run, check_run
            $table->string('method', 10)->nullable(); // GET, POST, etc.
            $table->string('endpoint', 500)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->json('headers')->nullable();
            $table->text('request_body')->nullable();
            $table->integer('status_code')->nullable();
            $table->text('response_body')->nullable();
            $table->integer('duration_ms')->nullable();
            $table->boolean('success')->default(true);
            $table->text('error_message')->nullable();
            $table->timestamp('logged_at');
            $table->timestamps();

            $table->index(['user_id', 'logged_at']);
            $table->index(['job_id', 'logged_at']);
            $table->index(['check_id', 'logged_at']);
            $table->index('type');
            $table->index('logged_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_logs');
    }
};
