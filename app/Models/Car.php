<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name','kilometers','primary_image','price','year', 'registration','description', 'user_id', 'model_id', 'engine_id', 'drive_type_id', 'color_id'];
    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }
    public function models()
    {
        return $this->model->belongsTo(Models::class);
    }

    public function engine()
    {
        return $this->belongsTo(Engine::class);
    }


    public function drive_type()
    {
        return $this->belongsTo(DriveType::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Images::class);
    }
    public function safeties()
    {
        return $this->belongsToMany(Safety::class,'car_safeties');
    }
    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }

    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }

    public function filterCars($request)
    {

        $cars = self::with('engine','drive_type','user','model','wishlist')
                    ->where('is_sold','0')
                    ->where('is_published','1');

        $models = CarModel::all();

        if ($request->has('brand') && $request->get('brand') != 0){
            $brandId = $request->input('brand');
            $models = $models->where('brand_id',$brandId);
        }


        if($request->has('model') && $request->get('model') != 0){
            $modelId = $request->input('model');
            $models = $models->where('model_id',$modelId);
        }


        if($request->has('body') && $request->get('body') != 0){

            $bodyId = $request->input('body');
            $models = $models->where('body_id',$bodyId);

        }
        if($request->has('maxPrice') && $request->get('maxPrice') != ''){
            $maxPrice = $request->input('maxPrice');
            $cars = $cars->where('price','<=',$maxPrice);
        }
        if($request->has('minPrice') && $request->get('minPrice') != ''){
            $minPrice = $request->input('minPrice');
            $cars = $cars->where('price','>=',$minPrice);
        }

        if($request->has('yearFrom') && $request->get('yearFrom') != 0){
            $yearFrom = $request->input('yearFrom');
            $cars = $cars->where('year','>=',$yearFrom);

        }
        if($request->has('yearTo') && $request->get('yearTo') != 0){
            $yearTo = $request->input('yearTo');
            $cars = $cars->where('year','<=',$yearTo);
        }

        if($request->has('transmission') && $request->get('transmission') != 0) {
            $transmissionId = $request->get('transmission');
            $cars->whereHas('engine', function ($query) use ($transmissionId) {
                $query->where('transmission_id', $transmissionId);
            });
        }

        if($request->has('fuel') && $request->get('fuel') != 0) {
            $fuelId = $request->get('fuel');
            $cars->whereHas('engine', function ($query) use ($fuelId) {
                $query->where('fuel_id', $fuelId);
            });
        }
        if($request->has('engine') && $request->get('engine') != '') {
            $engineValue = $request->get('engine');
            $cars->whereHas('engine', function ($query) use ($engineValue) {
                $query->where('engine_value', '<=' ,$engineValue);
            });
        }
        if($request->has('color') && $request->get('color') != 0) {
            $colorId = $request->get('color');
            $cars->where('color_id',$colorId);
        }
        if($request->has('drive_type') && $request->get('drive_type') != 0) {
            $driveTypeId = $request->get('drive_type');
            $cars->where('drive_type_id',$driveTypeId);
        }
        if($request->has('saeats') && $request->get('seats') != 0) {
            $seatId = $request->get('seats');
            $models = $models->where('seat_id',$seatId);
        }
        if($request->has('doors') && $request->get('doors') != 0) {
            $doorId = $request->get('doors');
            $models = $models->where('doors_id',$doorId);
        }
        if($request->has('horsepower') && $request->get('horsepower') != '') {
            $horsepower = $request->get('horsepower');
            $cars->whereHas('engine', function ($query) use ($horsepower) {
                $query->where('horsepower', '<=' ,$horsepower);
            });
        }
        if($request->has('registration') && $request->get('registration') != 0) {
            $registration = $request->get('registration');
            if($registration === 'unregistered'){
                $cars->where('registration',null);
            }
            if($registration === 'registered'){
                $cars->where('registration','!=',null);
            }
        }

        if($request->has('sort') && $request->get('sort') != 0){
            $sort = $request->input('sort');

            if (Str::contains($sort, 'asc')) {
                $cars->orderBy('price');
            } else if (Str::contains($sort, 'desc')) {
                $cars->orderByDesc('price');
            } else if (Str::contains($sort, 'old')) {
                $cars->orderBy('created_at');
            } else {
                $cars->orderByDesc('created_at');
            }
        }
        else {
            $cars->orderByDesc('created_at');
        }

        $modelIds = $models->pluck('id');
        return $cars->whereIn('model_id',$modelIds);


    }


}
