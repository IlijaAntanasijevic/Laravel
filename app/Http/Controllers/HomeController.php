<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends PrimaryController
{
    public function index()
    {
        $cars = Car::with('model','engine','user','wishlist')->get();
        $brands = Brand::all()->sortBy('name')->reject(function ($brand){
            return $brand->name === 'Other';
        });
        $bodies = Body::all();

        return view('pages.main.home',compact('cars','brands','bodies'));
    }


}
