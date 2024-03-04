<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i <= 6; $i++) {
            \DB::table('cars')->insert([
                'name' => $faker->word,
                'kilometers' => rand(1000, 200000),
                'primary_image' => 'car-'.$i.'.jpg',
                'price' => rand(5000, 50000),
                'year' => rand(1990, 2022),
                'description' => $faker->paragraph,
                'registration' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'is_sold' => false,
                'is_published' => true,
                'model_id' => $i,
                'engine_id' => rand(1, 6),
                'color_id' => rand(1,14),
                'drive_type_id' => rand(1,3),
                'user_id' => 1
            ]);

        }
    }
}
