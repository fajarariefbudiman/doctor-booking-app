<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('doctors')->insert([
            [
                'name' => 'dr. Hj Henny Herlina',
                'specialty' => 'Kesehatan Anak',
                'profile_picture' => 'henny.jpg',
            ],
            [
                'name' => 'dr. Yudi Prawira Winata',
                'specialty' => 'Kandungan dan Kebidanan',
                'profile_picture' => 'yudi.jpg',
            ],
            [
                'name' => 'dr. Fajar Englando Alan',
                'specialty' => 'Penyakit Dalam',
                'profile_picture' => 'fajar.jpg',
            ],
            [
                'name' => 'dr. Pierre Alexander',
                'specialty' => 'Orthopedi',
                'profile_picture' => 'pierre.jpg',
            ],
            [
                'name' => 'dr. Riska Amelia',
                'specialty' => 'Kandungan dan Kebidanan',
                'profile_picture' => 'amel.jpg',
            ],
            [
                'name' => 'dr. Ahmad Ruslan',
                'specialty' => 'Penyakit Dalam',
                'profile_picture' => 'ahmad.jpg',
            ],
        ]);
    }
}
