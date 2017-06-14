<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ActiveAir;

class Sensor extends Model
{
    protected $fillable = [
        'type',
        'brand',
        'model',
        'description',
        'status'
    ];
}
