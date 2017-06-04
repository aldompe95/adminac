<?php

namespace App;

use App\Area;
use App\Maintenance;
use Illuminate\Database\Eloquent\Model;

class AirConditioner extends Model
{
	protected $fillable = [
        'brand',
        'model',
        'purchase_at',
		'remission_at'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
