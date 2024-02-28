<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends PrimaryController
{
    public function index()
    {
       /* $this->data["homeCars"] = [
            [
                "id" => 1,
                "img" => 'car-1.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 2,
                "img" => 'car-10.jpg',
                'price' => '5.000',
                'type' => "Sport",
                "km" => '59.000',
                "fuelType" => "Benzine",
                "name" => "Lexus 2 ",
                "location" => "Belgrade"
            ],
            [
                "id" => 3,
                "img" => 'car-3.jpg',
                'price' => '9.000',
                'type' => "SUV",
                "km" => '439.000',
                "fuelType" => "Diesel",
                "name" => "Range Rover",
                "location" => "12345 Cathal St. Tampa City"
            ],
            [
                "id" => 4,
                "img" => 'car-4.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus 4",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 5,
                "img" => 'car-5.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 6,
                "img" => 'car-6.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 7,
                "img" => 'car-7.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 8,
                "img" => 'car-8.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ],
            [
                "id" => 9,
                "img" => 'car-1.jpg',
                'price' => '220.000',
                'type' => "Sport",
                "km" => '239.000',
                "fuelType" => "Diesel",
                "name" => "Lexus",
                "location" => "123 Cathal St. Tampa City"
            ]
        ];*/
        $data = Car::with('model','engine','user')->get();
        return view('pages.main.home',["cars" => $data]);
    }
}
