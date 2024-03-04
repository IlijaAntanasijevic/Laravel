<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertCarRequest;
use App\Models\Engine;
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

class CarController extends PrimaryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('engine','drive_type','user')->get();
        $data['brands'] = Brand::all()->sortBy('name')->reject(function ($brand){
            return $brand->name === 'Other';
        });
        $data['bodies'] = Body::all();
        $data['transmission'] = Transmission::all();
        return view('pages.cars.index', ['cars' => $cars, 'data' => $data]);
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
        /*
         array:20 [ // app\Http\Controllers\CarController.php:65
          "name" => "Ilija"
          "brand" => "5"
          "model" => "3"
          "body" => "14"
          "year" => "2000"
          "engine" => "2000"
          "doors" => "1"
          "seats" => "2"
          "color" => "12"
          "driveType" => "1"
          "horsepower" => "100",
          "kilometers" => "100000",
          "fuel" => "1"
          "transmission" => "1"
          "registration" => null
          "price" => "2000"
          "description" => "Test"
          "userId" => "2"
          "safety" => array:3 [
            0 => "6"
            1 => "8"
            2 => "11"
          ]
          "equipments" => array:3 [
            0 => "6"
            1 => "7"
            2 => "8"
          ]
          "images" => array:3 [
            0 =>
        Illuminate\Http
        \
        UploadedFile {#1327
              -test: false
              -originalName: "car-21.jpg"
              -mimeType: "image/jpeg"
              -error: 0
              #hashName: null
              path: "C:\xampp\tmp"
              filename: "phpF068.tmp"
              basename: "phpF068.tmp"
              pathname: "C:\xampp\tmp\phpF068.tmp"
              extension: "tmp"
              realPath: "
        C:\xampp
        \
        tmp\phpF068.tmp"
              aTime: 2024-03-03 23:28:34
              mTime: 2024-03-03 23:28:34
              cTime: 2024-03-03 23:28:34
              inode: 17451448556326416
              size: 367805
              perms: 0100666
              owner: 0
              group: 0
              type: "file"
              writable: true
              readable: true
              executable: false
              file: true
              dir: false
              link: false
              linkTarget: "C:\xampp\tmp\phpF068.tmp"
            }
            1 =>
        Illuminate\Http
        \
        UploadedFile {#1328
              -test: false
              -originalName: "car-22.jpg"
              -mimeType: "image/jpeg"
              -error: 0
              #hashName: null
              path: "C:\xampp\tmp"
              filename: "phpF069.tmp"
              basename: "phpF069.tmp"
              pathname: "C:\xampp\tmp\phpF069.tmp"
              extension: "tmp"
              realPath: "
        C:\xampp
        \
        tmp\phpF069.tmp"
              aTime: 2024-03-03 23:28:34
              mTime: 2024-03-03 23:28:34
              cTime: 2024-03-03 23:28:34
              inode: 6192449488013609
              size: 67115
              perms: 0100666
              owner: 0
              group: 0
              type: "file"
              writable: true
              readable: true
              executable: false
              file: true
              dir: false
              link: false
              linkTarget: "C:\xampp\tmp\phpF069.tmp"
            }
            2 =>
        Illuminate\Http
        \
        UploadedFile {#1329
              -test: false
              -originalName: "car-23.jpg"
              -mimeType: "image/jpeg"
              -error: 0
              #hashName: null
              path: "C:\xampp\tmp"
              filename: "phpF06A.tmp"
              basename: "phpF06A.tmp"
              pathname: "C:\xampp\tmp\phpF06A.tmp"
              extension: "tmp"
              realPath: "
        C:\xampp
        \
        tmp\phpF06A.tmp"
              aTime: 2024-03-03 23:28:34
              mTime: 2024-03-03 23:28:34
              cTime: 2024-03-03 23:28:34
              inode: 5066549581170988
              size: 317747
              perms: 0100666
              owner: 0
              group: 0
              type: "file"
              writable: true
              readable: true
              executable: false
              file: true
              dir: false
              link: false
              linkTarget: "C:\xampp\tmp\phpF06A.tmp"
            }
          ]
        ]
         */


        $data = $request->all();
        \DB::beginTransaction();
        try {

            $engine = Engine::create([
                'engine' => $data['engine'],
                'horsepower' => $data['horsepower'],
                'fuel_id' => $data['fuel'],
                'transmission_id' => $data['transmission']
            ]);

            $primaryImage = $data['images'][0];
            $primaryImageName = time() . rand(1,10000) . '.' . $primaryImage->extension();
            $primaryImage->move(public_path('assets/img/cars'), $primaryImageName);


            $car = Car::create([
                'name' => $data['name'],
                'kilometers' => $data['kilometers'],
                'primary_image' => $primaryImageName,
                'price' => $data['price'],
                'description' => $data['description'],
                'registration' => $data['registration'],
                'model_id' => $data['model'],
                'body_id' => $data['body'],
                'year' => $data['year'],
                'doors_id' => $data['doors'],
                'seats_id' => $data['seats'],
                'color_id' => $data['color'],
                'drive_type_id' => $data['driveType'],
                'user_id' => $data['userId']
            ]);

            $car->safeties()->attach($data['safety']);
            $car->equipment()->attach($data['equipments']);

            foreach ($data['images'] as $image) {
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/img/cars'), $imageName);
                $car->images()->create(['name' => $imageName]);
            }

            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Server error. Please try again later.');
        }
        return redirect()->back()->with('success', 'Car added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('model','engine','user', 'equipment','safeties','wishlist')->find($id);

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
