<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $appends = ['name'];
    public function getNameAttribute()
    {
        return $this->attributes['name'];
    }
    public function model()
    {
        return $this->hasMany(CarModel::class);
    }
}
