<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

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
}
