<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('bookings')->insert([
            [
                'user_id' => 1,
                'doctor_id' => 1,
                'schedule_id' => 1,
            ],
            [
                'user_id' => 2,
                'doctor_id' => 2,
                'schedule_id' => 3,
            ],
        ]);
    }
}
