<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DoorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $doors = ['2/3', '4/5'];
    public function run(): void
    {
        foreach ($this->doors as $door) {
            \DB::table('doors')->insert([
                'name' => $door,
            ]);
        }
    }
}
