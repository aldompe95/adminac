<?php

namespace App;

use App\Area;
use App\AirConditioner;
use Illuminate\Database\Eloquent\Model;
use App\ActiveSensor;
use App\Performance;

class ActiveAir extends Model
{

	protected $fillable = [
        'air_conditioner_id',
        'status'
    ];

    public function area()
    {	
        return $this->belongsTo(Area::class);
    }

    public function activeSensor()
    {
        return $this->hasMany(ActiveSensor::class);
    }

    public function performance()
    {
        return $this->hasMany(Performance::class);
    }

}
