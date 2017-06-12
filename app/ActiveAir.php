<?php

namespace App;

use App\Area;
use App\AirConditioner;
use Illuminate\Database\Eloquent\Model;

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

}
