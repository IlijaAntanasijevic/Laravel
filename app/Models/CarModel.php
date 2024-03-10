<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $fillable = ['model_id', 'brand_id', 'body_id', 'doors_id', 'seat_id'];

    public function model()
    {
        return $this->belongsTo(Models::class,'model_id');
    }
    public function seat()
    {
        return $this->belongsTo(Seats::class,'seat_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function body()
    {
        return $this->belongsTo(Body::class);
    }
    public function doors()
    {
        return $this->belongsTo(Doors::class);
    }


    public function car()
    {
        return $this->hasMany(Car::class);
    }

}
