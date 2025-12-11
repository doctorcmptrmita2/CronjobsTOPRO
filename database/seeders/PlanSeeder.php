<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::updateOrCreate(
            ['slug' => 'free'],
            [
                'name' => 'Free',
                'max_jobs' => 5,
                'max_checks' => 3,
                'min_interval_minutes' => 15,
                'min_check_interval_seconds' => 60,
                'log_retention_days' => 30,
            ]
        );

        Plan::updateOrCreate(
            ['slug' => 'pro'],
            [
                'name' => 'Pro',
                'max_jobs' => 100,
                'max_checks' => 50,
                'min_interval_minutes' => 1,
                'min_check_interval_seconds' => 30,
                'log_retention_days' => 90,
            ]
        );
    }
}
