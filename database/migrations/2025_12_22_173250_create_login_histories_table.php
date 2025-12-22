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
        Schema::create('login_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ip_address', 45);
            $table->text('user_agent')->nullable();
            $table->string('device_type', 50)->nullable(); // desktop, mobile, tablet
            $table->string('browser', 100)->nullable();
            $table->string('platform', 100)->nullable(); // Windows, macOS, Linux, iOS, Android
            $table->string('location')->nullable(); // City, Country
            $table->string('country_code', 2)->nullable();
            $table->boolean('is_new_device')->default(false);
            $table->boolean('is_new_location')->default(false);
            $table->boolean('is_suspicious')->default(false);
            $table->boolean('notification_sent')->default(false);
            $table->timestamp('logged_in_at');
            $table->timestamps();

            $table->index(['user_id', 'logged_in_at']);
            $table->index('ip_address');
        });

        // Add login_alerts_enabled to users table
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('login_alerts_enabled')->default(true)->after('notification_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_histories');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login_alerts_enabled');
        });
    }
};
