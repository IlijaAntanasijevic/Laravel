<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertCarRequest;
use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Doors;
use App\Models\DriveType;
use App\Models\Equipment;
use App\Models\Fuel;
use App\Models\Safety;
use App\Models\Seats;
use App\Models\Transmission;
use Illuminate\Http\Request;

class CarController extends PrimaryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('engine','drive_type','user')->get();
        $data['brands'] = Brand::all()->sortBy('name')->reject(function ($brand){
            return $brand->name === 'Other';
        });
        $data['bodies'] = Body::all();
        $data['transmission'] = Transmission::all();
        return view('pages.cars.index', ['cars' => $cars, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fuels = Fuel::all();
        $transmission = Transmission::all();
        $bodies = Body::all();
        $brands = Brand::all();
        $doors = Doors::all();
        $seats = Seats::all();
        $colors = Color::all();
        $driveTypes = DriveType::all();
        $safeties = Safety::all();
        $equipments = Equipment::all();


        return view('pages.cars.create',compact('fuels','transmission','bodies','brands','doors','seats','colors','driveTypes','safeties','equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsertCarRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('model','engine','user', 'equipment','safeties','wishlist')->find($id);

        $totalCars = Car::all()->groupBy('user_id')
                                ->map(function ($item){return count($item);})
                                ->first();
        $car->totalCars = $totalCars;

        return view('pages.cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
