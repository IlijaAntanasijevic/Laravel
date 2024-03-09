<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Doors;
use App\Models\DriveType;
use App\Models\Fuel;
use App\Models\Seats;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarPropertiesController extends Controller
{
    public function addModel(Request $request)
    {
        $request->validate([
            'modelName' => 'required|string',
            'brandId' => 'required|exists:brands,id',
            'bodyId' => 'required|exists:bodies,id',
            'seatsId' => 'required|exists:seats,id',
            'doorsId' => 'required|exists:doors,id'
        ]);

        try {
            $name = $request->modelName;
            $brandId = $request->brandId;
            $bodyId = $request->bodyId;
            $seatsId = $request->seatsId;
            $doorsId = $request->doorsId;

            CarModel::create([
                'name' => $name,
                'brand_id' => $brandId,
                'body_id' => $bodyId,
                'seat_id' => $seatsId,
                'doors_id' => $doorsId
            ]);

            return redirect()->back()->with('success', 'Model added successfully.');

        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }


    public function addBrand(Request $request)
    {

        $request->validate([
            'brandName' => 'required|string|unique:brands,name'
        ]);

        try {
            $name = $request->brandName;

            Brand::create([
                'name' => $name
            ]);

            return redirect()->back()->with('success', 'Brand added successfully.');

        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }


    }
    public function addColor(Request $request)
    {
        $request->validate([
            'colorName' => 'required|string|unique:colors,name'
        ]);
        try {
            $name = $request->colorName;

            Color::create([
                'name' => $name
            ]);

            return redirect()->back()->with('success', 'Color added successfully.');

        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }

    }
    public function addSeats(Request $request)
    {
        $request->validate([
            'seatsValue' => 'required|integer|unique:seats,value'
        ]);
        try {
            $seats = $request->seatsValue;

            Seats::create([
                'value' => $seats
            ]);

            return redirect()->back()->with('success', 'Seats added successfully.');
        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function addDoors(Request $request)
    {
        $request->validate([
            'doorValue' => 'required|unique:doors,name|regex:/^[0-9]+\/[0-9]+$/'
        ]);

        try {
            $doors = $request->doorValue;

            Doors::create([
                'name' => $doors
            ]);

            return redirect()->back()->with('success', 'Doors added successfully.');
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function addBody(Request $request)
    {
        $request->validate([
           'bodyName' => 'required|string|unique:bodies,name'
        ]);

        try {

            $bodyName = $request->bodyName;
            Body::create([
                'name' => $bodyName
            ]);

            return redirect()->back()->with('success', 'Body added successfully.');

        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function addDriveType(Request $request)
    {
        $request->validate([
            'driveTypeName' => 'required|string|unique:drive_types,name'
        ]);

        try {
            $driveType = $request->driveTypeName;
            DriveType::create([
                'name' => $driveType
            ]);

            return redirect()->back()->with('success', 'Drive type added successfully.');

        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }

    }

    public function addTransmission(Request $request)
    {
        $request->validate([
           'transmissionValue' => 'required|string|unique:transmissions,name'
        ]);

        try {
            $transmission = $request->transmissionValue;
            Transmission::create([
                'name' => $transmission
            ]);

            return redirect()->back()->with('success', 'Transmission added successfully.');
        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function addFuel(Request $request)
    {
        $request->validate([
           'fuelValue' => 'required|string|unique:fuels,name'
        ]);

        try {
            $fuel = $request->fuelValue;
            Fuel::create([
                'name' => $fuel
            ]);

            return redirect()->back()->with('success', 'Fuel added successfully.');
        }catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
