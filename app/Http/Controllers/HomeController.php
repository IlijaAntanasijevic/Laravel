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
        $perPage = 3;
        $brands = Brand::all()->sortBy('name');
        $bodies = Body::all();

         $cars = new Car();
         $data = $cars->filterCars($request);



        if($request->ajax()){
            $html = '';
            $page = $request->get('page', 1);
            $totalPages = ceil($data->count() / $perPage);
            $cars = $data->skip(($page - 1) * $perPage)
                         ->take($perPage)
                         ->get();

            foreach ($cars as $car) {
                $html .= view('pages.partials.homeCard', ['car' => $car, 'showOverlay' => true,'showSoldText' => false])->render();
            }
            return response()->json([
                'html' => $html,
                'hasMore' => $totalPages > $page
            ]);

        }

        $data = $data->take($perPage)->get();

        return view('pages.main.home', compact('data', 'brands', 'bodies'));
    }

    public function search_index()
    {
        $fuels = Fuel::all();
        $transmission = Transmission::all();
        $bodies = Body::all();
        $brands = Brand::all()->sortBy('name');
        $doors = Doors::all();
        $seats = Seats::all();
        $colors = Color::all();
        $driveTypes = DriveType::all();
        return view('pages.main.search',compact('fuels','transmission','bodies','brands','doors','seats','colors','driveTypes'));
    }

    public function search(Request $request)
    {
        $carModel = new Car();

        $cars = $carModel->filterCars($request);
        $cars = $cars->paginate(6)->withQueryString();
        $searchedInputs = $this->searchedInputs($request);

        $totalCars = $cars->total();

        return view('pages.main.searchedCars',['cars' => $cars,'totalCars' => $totalCars,'searchedInputs' => $searchedInputs]);
    }


    public function searchedInputs($request)
    {
        $data = [];
        if($request->has('brand') && $request->get('brand') != 0){
            $data[] = Brand::find($request->get('brand'))->name;
        }
        if($request->has('model') && $request->get('model') != 0){
            $data[] = CarModel::find($request->get('model'))->name;
        }
        if($request->has('body') && $request->get('body') != 0){
            $data[] = Body::find($request->get('body'))->name;
        }
        if($request->has('engine') && $request->get('engine') != ''){
            $data[] = 'Max engine: ' . $request->get('engine');
        }
        if($request->has('doors') && $request->get('doors') != 0){
            $data[] = Doors::find($request->get('doors'))->name;
        }
        if($request->has('seats') && $request->get('seats') != 0){
            $data[] = Seats::find($request->get('seats'))->value;
        }
        if($request->has('color') && $request->get('color') != 0){
            $data[] = ucfirst(Color::find($request->get('color'))->name);
        }
        if($request->has('drive_type') && $request->get('drive_type') != 0){
            $data[] = DriveType::find($request->get('drive_type'))->name;
        }
        if ($request->has('horsepower') && $request->get('horsepower') != ''){
            $data[] = 'Horsepower: ' . $request->get('horsepower');
        }
        if($request->has('fuel') && $request->get('fuel') != 0){
            $data[] = Fuel::find($request->get('fuel'))->name;
        }
        if($request->has('transmission') && $request->get('transmission') != 0){
            $data[] = Transmission::find($request->get('transmission'))->name;
        }
        if($request->has('registration') && $request->get('registration') != 0){
            if($request->get('registration') === 'unregistered'){
                $data[] = 'Unregistered';
            }
            if($request->get('registration') === 'registered'){
                $data[] = 'Registered';
            }
        }

        if($request->has('minPrice') && $request->get('minPrice') != 0){
            $data[] = 'Min price: ' . $request->get('minPrice');
        }
        if($request->has('maxPrice') && $request->get('maxPrice') != 0){
            $data[] = 'Max price: ' . $request->get('maxPrice');
        }
        if($request->get('yearFrom')){
            $data[] = ' From: ' . $request->get('yearFrom');
        }
        if($request->get('yearTo') && $request->get('yearTo') != 0){
            $data[] = ' To: ' . $request->get('yearTo');
        }

        return $data;


    }


}
