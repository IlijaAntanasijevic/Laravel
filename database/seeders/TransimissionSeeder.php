<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransimissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $transmission = ['Automatic', 'Manual','Semi-Automatic'];
    public function run(): void
    {
        foreach ($this->transmission as $transmission) {
            DB::table('transmissions')->insert([
                'name' => $transmission,
            ]);
        }
    }
}
