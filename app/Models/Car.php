<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name','kilometers','primary_image','price','year', 'registration','description', 'user_id', 'model_id', 'engine_id', 'drive_type_id', 'color_id'];
    public function model()
    {
        return $this->belongsTo(CarModel::class);
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

    public function getFilteredCars($request)
    {
        $perPage = 2;

        $cars = self::with('engine', 'user', 'wishlist')
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

        return $cars->limit($perPage)->get();
    }

}
