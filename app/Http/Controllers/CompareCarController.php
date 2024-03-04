<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Equipment;
use App\Models\Safety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompareCarController extends Controller
{
    public function index()
    {
        $data = session()->get('compare');
        $cars = [];
        $equipments = [];
        $safeties = [];


        if(session()->has('compare')){
            foreach ($data as $value){
                $cars[] = Car::with('model','engine','drive_type', 'color','safeties','equipment')->find($value);
            }
            $equipments = Equipment::all();
            $safeties = Safety::all();
        }



        $tmp = [];

        foreach ($cars as $car) {
            foreach ($car->getRelations() as $relations => $tables) {
                $tmp[$relations] = $tables;
            }
            $car['generalInformation'] = $tmp;
        }


        return view('pages.main.car-comparison',compact('cars','equipments','safeties'));

    }

    public function addToCompare(Request $request)
    {

        if(!$request->session()->has('compare')){
            $request->session()->put('compare', []);
        }

        $carId = $request->get('carId');
        $carExisting = false;

        foreach ($request->session()->get('compare') as $car){
            if($car == $carId){
                $carExisting = true;
            }
        }
        if($carExisting){
            return response()->json(["message" => "Car already added to compare."], 400);
        }
        if(count($request->session()->get('compare')) > 1){

            return response()->json(["message" => "You can compare only 2 cars."], 400);
        }
        if(!$carExisting){
            $request->session()->push('compare', $carId);
            return response()->json(["message" => "Car added to compare."], 201);
        }
        return response()->json(["message" => "Car not found."], 404);

    }
    public function removeFromCompare(Request $request)
    {
        try {
            $carId = $request->get('carId');
            $carsToCompare = session()->get('compare');

            $newItems = [];
            foreach ($carsToCompare as $car){


                if($car != $carId){
                    $newItems[] = $car;
                }
            }
            $request->session()->put('compare', $newItems);
            return redirect()->back()->with('success', 'Car removed from compare.');

        }catch (\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Server error. Please try again later.');
        }
    }
}
