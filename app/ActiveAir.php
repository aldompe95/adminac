<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sensor;

class ActiveAir extends Model
{
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
