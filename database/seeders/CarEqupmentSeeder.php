<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarEqupmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i =1; $i <= 60; $i++){
            \DB::table('car_equipments')->updateOrInsert([
                'equipment_id' => rand(1, 41),
                'car_id' => rand(1,6),
            ]);
        }
    }
}
