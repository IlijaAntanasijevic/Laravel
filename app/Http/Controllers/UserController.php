<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCarRequest;
use App\Http\Requests\UserRequest;
use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Doors;
use App\Models\DriveType;
use App\Models\Engine;
use App\Models\Equipment;
use App\Models\Fuel;
use App\Models\Images;
use App\Models\Models;
use App\Models\Safety;
use App\Models\Seats;
use App\Models\Transmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class UserController extends PrimaryController
{
    public function userProfile()
    {
        $user = auth()->user();

        return view('pages.user.user-index', ['user' => $user]);
    }

    public function updateUser(UserRequest $request)
    {
        $data = $request->all();
        try {
            $oldPassword = $data['oldPassword'];
            $newPassword = $data['newPassword'];
            if($oldPassword && $newPassword){
                if (!Hash::check($oldPassword, auth()->user()->password)) {
                    return redirect()->back()->with('passwordError', 'Old password is incorrect');
                }
            }

            $user = User::find(auth()->user()->id);
            $user->name = $data['name'];
            $user->last_name = $data['lastName'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->password = Hash::make($newPassword);
            $user->address = $data['address'];
            $user->city = $data['city'];



            if ($request->hasFile('avatar')) {
                $imageName = time() . '.' . $request->avatar->extension();

                try {
                    $request->avatar->move(public_path('assets/img/avatar'), $imageName);
                    $user->avatar = $imageName;
                } catch (\Exception $e) {
                    Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
                    return redirect()->back()->with("error", "Failed to upload avatar");
                }
            }
            $user->save();

            return redirect()->back()->with('success', 'User information updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());

            return redirect()->back()->with('error', 'Error while updating user information');

        }
    }
    public function showAllCars()
    {
        $userId = auth()->user()->id;
        $cars = Car ::with('model')
                    ->where('user_id', $userId)
                    ->where('is_published', 1)
                    ->where('is_sold', 0)
                    ->get();

        return view('pages.user.cars',['cars' => $cars]);
    }

    public function editCar($id)
    {
        $car = Car::with('model','engine','equipment','safeties')->find($id);
        $checkedSafety = $car->safeties->pluck('id')->toArray();
        $checkedEquipment = $car->equipment->pluck('id')->toArray();
        $fuels = Fuel::all();
        $transmission = Transmission::all();
        $bodies = Body::all();
        $brands = Brand::all()->sortBy('name');
        $doors = Doors::all();
        $seats = Seats::all();
        $colors = Color::all();
        $modelId = $car->model->brand_id;
        $driveTypes = DriveType::all();
        $equipments = Equipment::all();
        $safeties = Safety::all();

        $selectedModel = CarModel::where('brand_id',$car->model->brand_id)
            ->where('body_id',$car->model->body_id)
            ->where('seat_id',$car->model->seat_id)
            ->where('doors_id',$car->model->doors_id)->first()->id;

        $models = Models::select('id', 'name')
                ->whereHas('carModel', function ($query) use ($modelId) {
                    $query->where('brand_id', $modelId);})
                ->get();

        return view('pages.user.edit-car',compact('car','fuels','models','transmission','selectedModel','bodies','brands','doors','seats','colors','driveTypes','safeties','equipments','checkedEquipment','checkedSafety'));

    }

    public function updateCar(UpdateCarRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $car = Car::find($data['id']);
            $registration = null;

            $engineID = Engine::where('engine_value',$data['engine'])
                                ->where('horsepower',$data['horsepower'])
                                ->where('fuel_id',$data['fuel'])->first();
            if(!$engineID){
                $engineID = Engine::create([
                    'engine_value' => $data['engine'],
                    'horsepower' => $data['horsepower'],
                    'fuel_id' => $data['fuel'],
                    'transmission_id' => $data['transmission']
                ])->id;
            }
            else {
                $engineID = $engineID->id;
            }
            if(isset($data['registration'])){
                $registration = $data['registration'];
            }

            $car->name = $data['name'];
            $car->kilometers = $data['kilometers'];
            $car->price = $data['price'];
            $car->description = $data['description'];
            $car->year = $data['year'];
            $car->registration = $registration;
            $car->color_id = $data['color'];
            $car->drive_type_id = $data['driveType'];
            $car->engine_id = $engineID;

            $carModelId = CarModel::where('brand_id',$data['brand'])
                                ->where('body_id',$data['body'])
                                ->where('seat_id',$data['seats'])
                                ->where('doors_id',$data['doors'])->first();
            if(!$carModelId){
                $carModelId = CarModel::create([
                    'model_id' => $data['model'],
                    'brand_id' => $data['brand'],
                    'body_id' => $data['body'],
                    'seat_id' => $data['seats'],
                    'doors_id' => $data['doors']
                ])->id;
            }
            else {
                $carModelId = $carModelId->id;
            }
            $car->model_id = $carModelId;

            if(isset($data['safety']))
            {
                $car->safeties()->detach();
                $car->safeties()->attach($data['safety']);
            }
            else {
                $car->safeties()->detach();
            }
            if(isset($data['equipments'])){
                $car->equipment()->detach();
                $car->equipment()->attach($data['equipments']);
            }
            else {
                $car->equipment()->detach();
            }
            $images = [];

            if(isset($data['images'])){
                $countImages = count($data['images']);
                for ($i = 0; $i < $countImages; $i++) {
                    $imageName = time() . rand(1,10000000) . '.' . $data['images'][$i]->extension();
                    $data['images'][$i]->move(public_path('assets/img'), $imageName);
                    $images[] = [
                        'path' => $imageName,
                        'car_id' => $car->id
                    ];
                }
                \DB::table('images')->insert($images);
            }
            $car->save();

            DB::commit();
            return redirect()->back()->with('success', 'Car updated successfully!');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Error while updating car information');
        }

    }
    public function soldCar(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cars,id'
        ]);

        try {
            $id = $request->get('id');
            $car = Car::find($id);

            if (!$car) {
                return response()->json(['message' => 'Car not found'], 404);
            }

            $car->is_sold = 1;
            $car->save();
            return response()->json(['message' => 'Car sold'], 200);
        }
        catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['message' => 'Server error'], 500);
        }

    }

    public function deleteCarImage(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $id = $request->id;
        $path = $request->path;

        $image = Images::where('path',$path)->where('car_id',$id)->first();


        if($image){
            try {
                $image->delete();
                if(File::exists(public_path('assets/img/' . $image->path)))
                {
                    File::delete(public_path('assets/img/' . $image->path));
                }
                return response()->json(['message' => 'Image deleted'], 202);
            } catch (\Exception $e) {
                Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
                return response()->json(['message' => 'Server error'], 500);
            }
        }
        $primaryImage = Car::find($id)->primary_image;
        try {
            $total = Images::where('car_id',$id)->count();
            if($total == 0){
                return response()->json(['message' => 'You can not delete the last image'], 409);
            }

            if($primaryImage == $path){
                $findNewPrimaryImage = Images::where('car_id',$id)->first();

                $car = Car::find($id);
                $car->primary_image = $findNewPrimaryImage->path;
                $car->save();

                $findNewPrimaryImage->delete();
                return response()->json(['message' => 'Image deleted'], 202);

            }
            return response()->json(['message' => 'Server error'], 500);

        }catch (\Exception $e){
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['message' => 'Server error'], 500);
        }
    }
}
