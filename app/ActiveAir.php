<?php

namespace App;

use App\Area;
use Illuminate\Database\Eloquent\Model;
use App\Sensor;
use App\Performance;

class ActiveAir extends Model
{
	  protected $fillable = [
        'air_conditioner_id'
    ];

    public function area()
    {	
        return $this->belongsTo(Area::class);
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);

    }

    public function performance()
    {
        return $this->hasMany(Performance::class);
    }
}
