<?php

namespace App;

use App\Area;
use Illuminate\Database\Eloquent\Model;

class ActiveAir extends Model
{
	protected $fillable = [
        'air_conditioner_id'
    ];

    public function area()
    {	
        return $this->belongsTo(Area::class);
    }
}
