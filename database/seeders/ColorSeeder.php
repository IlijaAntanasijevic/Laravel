<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $colors = ['red', 'blue', 'green', 'yellow', 'black', 'white', 'silver', 'gray', 'brown', 'orange', 'purple', 'gold', 'pink', 'bronze', 'other'];

    public function run(): void
    {
        foreach ($this->colors as $color) {
            DB::table('colors')->insert([
                'name' => $color
            ]);
        }
    }
}
