<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doors extends Model
{
    use HasFactory;

    public function model()
    {
        return $this->hasMany(CarModel::class);
    }
}
