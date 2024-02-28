<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private array $fuel = ['Gasoline', 'Diesel', 'Electric', 'Hybrid'];
    public function run(): void
    {
        foreach ($this->fuel as $fuel) {
            DB::table('fuels')->insert([
                'name' => $fuel,
            ]);
        }
    }
}
