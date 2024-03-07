<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            $user = User::find(auth()->user()->id);
            $user->name = $data['name'];
            $user->last_name = $data['lastName'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->city = $data['city'];

            if ($request->hasFile('avatar')) {
                $imageName = time() . '.' . $request->avatar->extension();

                try {
                    $request->avatar->move(public_path('assets/img/avatar'), $imageName);
                    $user->avatar = $imageName;
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return redirect()->back()->with("error", "Failed to upload avatar");
                }
            }
            $user->save();

            return redirect()->back()->with('success', 'User information updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error while updating user information');

        }
    }
    public function showAllCars()
    {
        $userId = auth()->user()->id;
        $cars = Car ::with('model')->where('user_id', $userId)->get();

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
        $models = CarModel::where('brand_id',$car->model->brand_id)->get();
        $driveTypes = DriveType::all();
        $equipments = Equipment::all();
        $safeties = Safety::all();
        return view('pages.user.edit-car',compact('car','fuels','models','transmission','bodies','brands','doors','seats','colors','driveTypes','safeties','equipments','checkedEquipment','checkedSafety'));

    }

    public function updateCar()
    {

    }
    public function soldCar()
    {

    }
}
