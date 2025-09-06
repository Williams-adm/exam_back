<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            'masculino',
            'femenino',
        ];

        foreach ($genders as $gender) {
            Gender::create([
                'type_gen' => $gender
            ]);
        }
    }
}
