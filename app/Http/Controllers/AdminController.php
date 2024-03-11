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
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
        $cars = Car::where('is_sold',0)->orderByDesc()->paginate(9);
        return view('admin.pages.cars',['cars'=>$cars]);
    }
    public function showCar($id)
    {
        $car = Car::find($id);
        $totalSaved = WishList::where('car_id',$id)->count();

        return view('admin.pages.showCar',['car'=>$car , 'totalSaved'=>$totalSaved]);
    }

    public function carProperties(Request $request)
    {

        $car = Car::groupBy('model_id')
                    ->select('model_id')
                    ->selectRaw('count(*) as count')
                    ->where('is_sold',0)
                    ->where('is_published',1)
                    ->get();
        $models = Models::with('carModel')->get();
        $brands = Brand::all();
        $bodies = Body::all();
        $seats = Seats::all();
        $doors = Doors::all();
        $colors = Color::all();
        $transmissions = Transmission::all();
        $fuels = Fuel::all();
        $driveTypes = DriveType::all();




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

    public function deleteCar(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|exists:cars,id'
        ]);

        try {
            $car = Car::find($request->id);
            $car->safeties()->detach();
            $car->equipment()->detach();
            $images = $car->images;
            foreach ($images as $image)
            {
                if(File::exists(public_path('assets/img/' . $image->path)))
                {
                    File::delete(public_path('assets/img/' . $image->path));
                }
            }
            $car->images()->delete();

            $car->delete();

            return response()->json(['success' => 'Car deleted successfully!'], 200);
        }catch (\Exception $e)
        {
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function soldCars()
    {
        $cars = Car::where('is_sold',1)->get();
        return view('admin.pages.soldCars',['cars'=>$cars]);
    }
}
