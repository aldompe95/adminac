<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sensor;
use App\Performance;

class ActiveAir extends Model
{
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function performance()
    {
        return $this->hasMany(Performance::class);
    }
}
