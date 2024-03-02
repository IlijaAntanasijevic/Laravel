<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarController extends PrimaryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = CarModel::all();
        return view('pages.cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
