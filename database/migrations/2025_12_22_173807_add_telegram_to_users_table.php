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
        Schema::table('users', function (Blueprint $table) {
            $table->string('telegram_chat_id')->nullable()->after('login_alerts_enabled');
            $table->string('telegram_username')->nullable()->after('telegram_chat_id');
            $table->boolean('telegram_enabled')->default(false)->after('telegram_username');
            $table->string('telegram_verification_code')->nullable()->after('telegram_enabled');
            $table->timestamp('telegram_verified_at')->nullable()->after('telegram_verification_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'telegram_chat_id',
                'telegram_username',
                'telegram_enabled',
                'telegram_verification_code',
                'telegram_verified_at',
            ]);
        });
    }
};
