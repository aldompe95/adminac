<?php

namespace App;

use App\Building;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $fillable = [
	    'name'
	];

    public function building()
    {	
        return $this->belongsTo(Building::class);
    }

    public function airconditioner()
    {
        return $this->hasMany(AirConditioner::class);
    }
}
