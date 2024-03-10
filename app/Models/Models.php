<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function carModel()
    {
        return $this->hasMany(CarModel::class,'model_id');
    }
}
