<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            // Format jadwal sebagai string
            $schedule = 'Senin: ' . $faker->time('H:i') . '-' . $faker->time('H:i', '12:00') . ', ' .
                        'Rabu: ' . $faker->time('H:i', '13:00') . '-' . $faker->time('H:i', '17:00') . ', ' .
                        'Jumat: ' . $faker->time('H:i', '08:00') . '-' . $faker->time('H:i', '14:00');
        
            DB::table('doctors')->insert([
                'code' => 'D' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'specialist' => $faker->randomElement(['Kardiologi', 'Neurologi', 'Pediatri', 'Ortopedi', 'Dermatologi']),
                'number' => $faker->phoneNumber,
                'schedule' => $schedule,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }        
    }
}
