<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertCarRequest;
use App\Models\Engine;
use App\Models\Images;
use App\Models\Year;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarController extends PrimaryController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = Car::with('engine','drive_type','user','model')
                    ->where('is_published','1')
                    ->where('is_sold','0');

        $sort = $request->get('sort');

        $models = CarModel::all();

        if(Str::contains($sort,'asc')){
            $cars->orderBy('price');
        }
        else if (Str::contains($sort,'desc')){
            $cars->orderByDesc('price');
        }
        else if (Str::contains($sort,'old')){
            $cars->orderBy('created_at');
        }
        else {
            $cars->orderByDesc('created_at');
        }

        if($request->has('brand') && $request->get('brand') != 0){
            $brandId = $request->get('brand');
            $models = $models->where('brand_id',$brandId);
        }
        if($request->has('model') && $request->get('model') != 0){
            $modelId = $request->get('model');
            $models = $models->where('id',$modelId);
        }
        if($request->has('body') && $request->get('body') != 0){
            $bodyId = $request->get('body');
            $models = $models->where('body_id',$bodyId);
        }
        if($request->has('transmission') && $request->get('transmission') != 0) {
            $transmissionId = $request->get('transmission');
            $cars->whereHas('engine', function ($query) use ($transmissionId) {
                $query->where('transmission_id', $transmissionId);
            });

        }

        $modelIds = $models->pluck('id');
        $cars->whereIn('model_id',$modelIds);
        $cars = $cars->paginate(6)->withQueryString();

        $totalCars = $cars->total();
        $data['brands'] = Brand::all()->sortBy('name');
        $data['bodies'] = Body::all();
        $data['transmission'] = Transmission::all();
        return view('pages.cars.index', ['cars' => $cars, 'data' => $data,'totalCars' => $totalCars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fuels = Fuel::all();
        $transmission = Transmission::all();
        $bodies = Body::all();
        $brands = Brand::all();
        $doors = Doors::all();
        $seats = Seats::all();
        $colors = Color::all();
        $driveTypes = DriveType::all();
        $safeties = Safety::all();
        $equipments = Equipment::all();


        return view('pages.cars.create',compact('fuels','transmission','bodies','brands','doors','seats','colors','driveTypes','safeties','equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsertCarRequest $request)
    {


        $data = $request->all();

        $carModel = CarModel::find($data['model']);

        $years = $carModel->year()->pluck('year');
        if ( $data['year'] <= date('Y')  && $data['year'] >= 1980 && !$years->contains($data['year'])) {
            $year = Year::firstOrCreate(['year' => $data['year']]);
            $carModel->year()->attach($year);
        }

        \DB::beginTransaction();
        try {

            $engineId = Engine::create([
                'engine_value' => $data['engine'],
                'horsepower' => $data['horsepower'],
                'fuel_id' => $data['fuel'],
                'transmission_id' => $data['transmission']
            ])->id;



            $primaryImage = $data['images'][0];
            $primaryImageName = time() . rand(1,1000000) . '.' . $primaryImage->extension();
            $primaryImage->move(public_path('assets/img'), $primaryImageName);


            $car = Car::create([
                'name' => $data['name'],
                'kilometers' => $data['kilometers'],
                'primary_image' => $primaryImageName,
                'price' => $data['price'],
                'year' => $data['year'],
                'description' => $data['description'],
                'registration' => $data['registration'],
                'model_id' => $data['model'],
                'engine_id' => $engineId,
                'color_id' => $data['color'],
                'drive_type_id' => $data['driveType'],
                'user_id' => $data['userId']
            ]);

            if(isset($data['safety']))
            {
                $car->safeties()->attach($data['safety']);

            }
            if(isset($data['equipments'])){
                $car->equipment()->attach($data['equipments']);
            }
            $otherImages = [];
            for ($i = 1; $i < count($data['images']); $i++) {
                $imageName = time() . rand(1,10000000) . '.' . $data['images'][$i]->extension();
                $data['images'][$i]->move(public_path('assets/img'), $imageName);
                $otherImages[] = [
                    'path' => $imageName,
                    'car_id' => $car->id
                ];
            }

            //Images::createMany($otherImages);
            \DB::table('images')->insert($otherImages);

            \DB::commit();
            return response()->json(['success' => 'Car added successfully!'], 201);

        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['error' => 'Server error'], 500);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('model.year','engine','user', 'equipment','safeties','wishlist')->find($id);

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
