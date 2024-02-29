<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 30; $i++){
            \DB::table('images')->insert([
                'path' => 'primaryCar.jpg',
                'car_id' => rand(1, 6)
            ]);
        }
    }
}
