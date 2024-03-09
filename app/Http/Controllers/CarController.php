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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CarController extends PrimaryController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $carModel = new Car();
        $cars = $carModel->filterCars($request);
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
            Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
            return response()->json(['error' => 'Server error'], 500);

        }

    }

    public function show(string $id)
    {
        $car = Car::with('model.year','engine','user', 'equipment','safeties','wishlist')->find($id);

        $totalCars = Car::all()->groupBy('user_id')
                                ->map(function ($item){return count($item);})
                                ->first();
        $car->totalCars = $totalCars;

        return view('pages.cars.show', ['car' => $car]);
    }

   public function approveCar(Request $request)
   {
       try {
           $request->validate([
               'id' => 'required|numeric'
           ]);

           $car = Car::find($request->id);
           $car->is_published = 1;
           $car->save();

           return response()->json(['success' => 'Car approved successfully!'], 200);
       }
       catch (\Exception $e)
       {
           Log::error($e->getMessage() . "Stack Trace: " . $e->getTraceAsString());
           return response()->json(['error' => 'Server error'], 500);
       }
   }

   public function destroy(Request $request)
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



}
