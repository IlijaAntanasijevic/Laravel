<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i = 1980; $i <= 2024; $i++) {
            \DB::table('years')->insert([
                'year' => $i,
            ]);
        }
    }
}
