<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSafetySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i =1; $i <= 60; $i++){
            \DB::table('car_safeties')->updateOrInsert([
                'safety_id' => rand(1,44),
                'car_id' => rand(1,6),
            ]);
        }
    }
}
