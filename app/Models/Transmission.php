<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function engine()
    {
        return $this->hasMany(Engine::class);
    }
}
