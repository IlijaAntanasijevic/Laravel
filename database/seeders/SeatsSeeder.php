<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //private $values = [2,3,4,5,6,7,8];
    public function run(): void
    {
        for($i = 2; $i <= 8; $i++) {
            \DB::table('seats')->insert([
                'value' => $i,
            ]);
        }
    }
}
