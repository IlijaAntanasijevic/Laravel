<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $brands =  [
        "Toyota",
        "Ford",
        "Chevrolet",
        "Honda",
        "Volkswagen",
        "Nissan",
        "Mercedes-Benz",
        "BMW",
        "Audi",
        "Hyundai",
        "Kia",
        "Subaru",
        "Jeep",
        "Tesla",
        "Volvo",
        "Mazda",
        "Lexus",
        "Porsche",
        "Cadillac",
        "Acura",
        "Buick",
        "Chrysler",
        "Dodge",
        "Jaguar",
        "Land Rover",
        "Lincoln",
        "Mitsubishi",
        "Ram",
        "Mini",
        "Fiat",
        "Alfa Romeo",
        "Maserati",
        "Genesis",
        "Bentley",
        "Ferrari",
        "McLaren",
        "Rolls-Royce",
        "Lamborghini",
        "Bugatti",
        'Other'
    ];
    public function run(): void
    {
//        $faker = Faker::create();
//        $faker->addProvider(new \Faker\Provider\FakeCar($faker));

       foreach ($this->brands as $brand){
              \DB::table('brands')->insert([
                'name' => $brand,
              ]);
       }
    }
}
