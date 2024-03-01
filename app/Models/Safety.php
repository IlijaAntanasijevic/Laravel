<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safety extends Model
{
    use HasFactory;

    public function cars()
    {
        return $this->belongsToMany(Car::class,'car_safeties');
    }

}
