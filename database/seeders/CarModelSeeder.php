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
    private array $models = ['Q8', 'A6', 'A3', '320d', 'M5','X5'];
    public function run(): void
    {
        //        $faker = Faker::create();
        //        $faker->addProvider(new \Faker\Provider\FakeCar($faker));
        $faker = Faker::create();
        foreach ($this->models as $model) {
            DB::table('car_models')->insert([
                'name' => $model,
                'year' => rand(2010,2023),
                'brand_id' => rand(1, 20),
                'body_id' => rand(1, 5),
                'seat_id' => 4,
                'doors_id' => 2
            ]);
        }
    }
}
