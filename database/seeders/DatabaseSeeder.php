<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SafetySeeder::class,
            EquipmentSeeder::class,
            FuelSeeder::class,
            TransimissionSeeder::class,
            EngineSeeder::class,
            ColorSeeder::class,
            DriveTypeSeeder::class,
            ImagesSeeder::class,
            CarSeeder::class,
            CarFeaturesSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            BrandSeeder::class,
            DoorsSeeder::class,
            SeatsSeeder::class,
            ModelSeeder::class,
            MenuSeeder::class
        ]);
    }
}
