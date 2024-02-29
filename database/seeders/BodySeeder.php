<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $values = [
        "Sedan",
        "SUV",
        "Coupe",
        "Convertible",
        "Hatchback",
        "Wagon",
        "Van",
        "Truck",
        "Crossover",
        "Minivan",
        "Pickup",
        "Roadster",
        "Station Wagon",
        "Limousine",
        "Compact",
        "Supercar",
        "Cabriolet",
        "Off-road",
    ];
    public function run(): void
    {
        foreach ($this->values as $value) {
            \DB::table('bodies')->insert([
                'name' => $value
            ]);
        }
    }
}
