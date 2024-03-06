<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Doors;
use App\Models\DriveType;
use App\Models\Fuel;
use App\Models\Seats;
use App\Models\Transmission;
use Illuminate\Http\Request;

class HomeController extends PrimaryController
{
    public function index(Request $request)
    {
        /*
         $cars = new Car();
        $cars->getFilteredCars($request);
         */
        $perPage = 2;

        $cars = Car::with('engine', 'user', 'wishlist')
                    ->where('is_sold','0')
                    ->where('is_published','1')
                    ->orderByDesc('created_at');

        $models = CarModel::all();

        if ($request->has('brand') && $request->get('brand') != 0){
            $brandId = $request->input('brand');
             //$modelIDs = CarModel::where('brand_id',$brandId)->pluck('id');
            $models = $models->where('brand_id',$brandId);
        }

        if($request->has('model') && $request->get('model') != 0){
            $modelId = $request->input('model');
            //$modelIDs = CarModel::where('id',$modelId)->pluck('id');
            $models = $models->where('id',$modelId);
        }
        if($request->has('body') && $request->get('body') != 0){
            $bodyId = $request->input('body');
            //$modelIDs = CarModel::where('body_id',$bodyId)->pluck('id');

            $models = $models->where('body_id',$bodyId);

        }
        if($request->has('maxPrice') && $request->get('maxPrice') != ''){

            $maxPrice = $request->input('maxPrice');
            $cars = $cars->where('price','<=',$maxPrice);
        }
        if($request->has('yearFrom') && $request->get('yearFrom') != 0){
            $yearFrom = $request->input('yearFrom');
            $cars = $cars->where('year','>=',$yearFrom);
        }
        if($request->has('yearTo') && $request->get('yearTo') != 0){
            $yearTo = $request->input('yearTo');
            $cars = $cars->where('year','<=',$yearTo);
        }

        $modelIds = $models->pluck('id');
        $cars->whereIn('model_id',$modelIds);


        if ($request->ajax()) {
            $html = '';
            $page = $request->get('page', 1);
            $totalPages = ceil($cars->count() / $perPage);

            if($totalPages >= $page) {
                $cars = $cars->skip(($page - 1) * $perPage)
                    ->take($perPage)
                    ->get();
                foreach ($cars as $car) {
                    $html .= view('pages.cars.homeCard', ['car' => $car, 'showOverlay' => true])->render();
                }
                return response()->json([
                    'html' => $html,
                    'hasMore' => $totalPages > $page
                ]);
            }
            return response()->json([
                'html' => '',
                'hasMore' => false
            ]);

        }

        $cars = $cars->limit($perPage)->get();
        $brands = Brand::all()->sortBy('name');
        $bodies = Body::all();

        return view('pages.main.home', compact('cars', 'brands', 'bodies'));
    }

    public function search_index()
    {
        $fuels = Fuel::all();
        $transmission = Transmission::all();
        $bodies = Body::all();
        $brands = Brand::all();
        $doors = Doors::all();
        $seats = Seats::all();
        $colors = Color::all();
        $driveTypes = DriveType::all();
        return view('pages.main.search',compact('fuels','transmission','bodies','brands','doors','seats','colors','driveTypes'));
    }

    public function search()
    {
        $cars = Car::with('engine','drive_type','user','model')
            ->where('is_published','1')
            ->where('is_sold','0')->paginate(6);


        return view('pages.main.searchedCars',['cars' => $cars]);
    }


}
