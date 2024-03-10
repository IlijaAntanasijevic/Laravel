<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Doors;
use App\Models\DriveType;
use App\Models\Engine;
use App\Models\Fuel;
use App\Models\Models;
use App\Models\Seats;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

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
            DB::beginTransaction();
            $name = $request->modelName;
            $brandId = $request->brandId;
            $bodyId = $request->bodyId;
            $seatsId = $request->seatsId;
            $doorsId = $request->doorsId;
            $createModel = Models::create([
               'name' => $name
            ]);
            $modelId = $createModel->id;

            CarModel::create([
                'model_id' => $modelId,
                'brand_id' => $brandId,
                'body_id' => $bodyId,
                'seat_id' => $seatsId,
                'doors_id' => $doorsId
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Model added successfully.');

        }catch (\Exception $e) {
            DB::rollBack();
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

    public function deleteModel(Request $request)
    {
        $request->validate([
           'id' => 'required|numeric|exists:car_models,id'
        ]);

        try {
            $model = CarModel::find($request->id);
            $carsCount = Car::where('model_id', $model->id)->count();

            if ($carsCount == 0) {
                $model->delete();
                return response()->json(['success' => 'Model deleted successfully!'], 200);
            }

                return response()->json(['error' => 'Model is in use.'], 400);



        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }

    }

    public function deleteBrand(Request $request)
    {
     /*   $request->validate([
            'id' => 'required|numeric|exists:car_models,id'
        ]);*/

        try {
            $brand = Brand::find($request->id);
            $models = CarModel::where('brand_id', $brand->id)->get();
            if(count($models) == 0){
                $brand->delete();
                return response()->json(['success' => 'Brand deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Brand is in use.'], 400);



        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteColor(Request $request)
    {
    /*    $request->validate([
            'id' => 'required|numeric|exists:colors,id'
        ]);*/

        try {
            $color = Color::find($request->id);
            $cars = Car::where('color_id', $color->id)->get();
            if(count($cars) == 0){
                $color->delete();
                return response()->json(['success' => 'Color deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Color is in use.'], 400);

        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
    public function deleteSeats(Request $request)
    {
       /* $request->validate([
            'id' => 'required|numeric|exists:seats,id'
        ]);*/

        try {
            $seats = Seats::find($request->id);
            $models = CarModel::where('seat_id', $seats->id)->get();
            if(count($models) == 0){
                $seats->delete();
                return response()->json(['success' => 'Seats deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Seats is in use.'], 400);
        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteDoors(Request $request)
    {
        try {
         $doors = Doors::find($request->id);
            $models = CarModel::where('doors_id', $doors->id)->get();
            if(count($models) == 0){
                $doors->delete();
                return response()->json(['success' => 'Doors deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Doors is in use.'], 400);
        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteBody(Request $request)
    {
        try {
            $body = Body::find($request->id);
            $models = CarModel::where('body_id', $body->id)->get();
            if(count($models) == 0){
                $body->delete();
                return response()->json(['success' => 'Body deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Body is in use.'], 400);
        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteDriveType(Request $request)
    {
        try {
            $driveType = DriveType::find($request->id);
            $cars = Car::where('drive_type_id', $driveType->id)->get();
            if(count($cars) == 0){
                $driveType->delete();
                return response()->json(['success' => 'Drive type deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Drive type is in use.'], 400);
        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteTransmission(Request $request)
    {
        try {
            $transmission = Transmission::find($request->id);
            $engine = Engine::where('transmission_id', $transmission->id)->get();
            if(count($engine) == 0){
                $transmission->delete();
                return response()->json(['success' => 'Transmission deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Transmission is in use.'], 400);

        }catch (Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function deleteFuel(Request $request)
    {
        try {
            $fuel = Fuel::find($request->id);
            $engine = Engine::where('fuel_id', $fuel->id)->get();
            if(count($engine) == 0){
                $fuel->delete();
                return response()->json(['success' => 'Fuel deleted successfully!'], 200);
            }
            return response()->json(['error' => 'Fuel is in use.'], 400);

        }catch (Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}
