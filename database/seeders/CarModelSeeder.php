<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //        $faker = Faker::create();
        //        $faker->addProvider(new \Faker\Provider\FakeCar($faker));
        $faker = Faker::create();
        for ($i = 1; $i <= 6; $i++) {
            DB::table('car_models')->insert([
                'model_id' => rand(1, 6),
                'brand_id' => rand(1, 20),
                'body_id' => rand(1, 5),
                'seat_id' => 4,
                'doors_id' => 2
            ]);
        }
    }
}
