<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        for($i = 0; $i < 6 ; $i++) {
            DB::table('engines')->insert([
                'engine_value' => rand(1400, 2000),
                'horsepower' => rand(70, 200),
                'fuel_id' => rand(1,4),
                'transmission_id' => rand(1,3),
            ]);
        }
    }
}
