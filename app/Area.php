<?php

namespace App;

use App\Building;
use App\ActiveAir;
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

    public function activeAir()
    {
        return $this->hasMany(ActiveAir::class);
    }
}
