<?php

namespace App;

use App\Area;
use App\Technological;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
	protected $fillable = [
	    'name'
	];

  	public function technological()
    {
        return $this->belongsTo(Technological::class);
    }

    public function area()
    {
        return $this->hasMany(Area::class);
    }
}
