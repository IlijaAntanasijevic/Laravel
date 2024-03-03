<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = \DB::table('car_models')->get();
        $years = \DB::table('years')->get();

        for($i = 0; $i < 50 ; $i++) {
            \DB::table('model_year')->insert([
                'model_id' => rand(1,6),
                'year_id' => rand(1,45),
            ]);
        }
    }
}
