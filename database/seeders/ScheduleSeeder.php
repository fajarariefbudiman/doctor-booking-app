<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('schedules')->insert([
            [
                'doctor_id' => 1,
                'schedule_date' => '2025-09-10',
                'schedule_time' => '11:00:00',
                'is_available' => true,
            ],
            [
                'doctor_id' => 1,
                'schedule_date' => '2025-09-10',
                'schedule_time' => '13:00:00',
                'is_available' => true,
            ],
            [
                'doctor_id' => 2,
                'schedule_date' => '2025-09-11',
                'schedule_time' => '15:00:00',
                'is_available' => true,
            ],
        ]);
    }
}
