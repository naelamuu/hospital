<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
    $dateOfBirth = $faker->date('Y-m-d', '-20 years'); // Menghasilkan tanggal lahir acak dalam 20 tahun terakhir
    $age = \Carbon\Carbon::parse($dateOfBirth)->age;   // Menghitung usia berdasarkan tanggal lahir

    DB::table('patients')->insert([
        'code' => 'P' . str_pad($index, 3, '0', STR_PAD_LEFT),
        'name' => $faker->name,
        'gender' => $faker->randomElement(['Male', 'Female']),
        'date_of_birth' => $dateOfBirth,
        'age' => $age,
        'number' => $faker->phoneNumber,               // Gunakan phoneNumber untuk nomor telepon
        'address' => $faker->address,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}


    }
}
