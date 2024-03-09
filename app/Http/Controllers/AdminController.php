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
use App\Models\Seats;
use App\Models\Transmission;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCars = Car::where('is_sold',0)->where('is_published',1)->count();
        $totalSoldCars = Car::where('is_sold',1)->count();
        $wishList  = WishList::get()->pluck('car_id');
        $totalSavedCars = Car::where('is_sold',0)->whereIn('id',$wishList)->count();
        $carsToApprove = Car::where('is_published',0)->get();
        return view('admin.pages.index',compact('totalUsers','totalCars','totalSoldCars','totalSavedCars','carsToApprove'));
    }

    public function users()
    {
        $users = User::get();
        return view('admin.pages.users',['users'=>$users]);
    }

    public function profile($id)
    {
        $user = User::find($id);
        $cars = Car::where('user_id',$id)->where('is_sold',0)->get();
        $soldCars = Car::where('user_id',$id)->where('is_sold',1)->get();
        return view('admin.pages.userProfile',compact('user','cars','soldCars'));
    }
    public function cars()
    {
        $cars = Car::where('is_sold',0)->get();
        return view('admin.pages.cars',['cars'=>$cars]);
    }
    public function showCar($id)
    {
        $car = Car::find($id);
        $totalSaved = WishList::where('car_id',$id)->count();

        return view('admin.pages.showCar',['car'=>$car , 'totalSaved'=>$totalSaved]);
    }

    public function carProperties()
    {
        $car = Car::groupBy('model_id')
                    ->select('model_id')
                    ->selectRaw('count(*) as count')
                    ->where('is_sold',0)
                    ->where('is_published',1)
                    ->get();
        $models = CarModel::get();
        $brands = Brand::all();
        $bodies = Body::all();
        $seats = Seats::all();
        $doors = Doors::all();
        $colors = Color::all();
        $transmissions = Transmission::all();
        $fuels = Fuel::all();
        $driveTypes = DriveType::all();
        $models = $models->map(function($model) use ($car){
            $model->total_in_use = $car->where('model_id',$model->id)->first()->count ?? 0;
            return $model;
        });


        return view('admin.pages.edit',compact('models','brands','bodies','seats','doors','colors','driveTypes','transmissions','fuels'));
    }
    public function wishlist()
    {
        $cars = Car::where('is_sold',0)->where('is_published',1)->get();

        $wishListCount = WishList::select('car_id')
                                    ->selectRaw('count(*) as count')
                                    ->groupBy('car_id')
                                    ->orderBy('count','desc')
                                    ->get();
         $cars->map(function($car) use ($wishListCount){
            $car->total_saved = $wishListCount->where('car_id',$car->id)->first()->count ?? 0;
            return $car;
        });

        $cars = $cars->sortByDesc('total_saved');


        return view('admin.pages.wishlist',compact('cars','wishListCount'));

    }
}
