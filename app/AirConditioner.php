<?php

namespace App;

use App\Technological;
use App\Maintenance;
use Illuminate\Database\Eloquent\Model;

class AirConditioner extends Model
{
	protected $fillable = [
        'brand',
        'model',
        'purchase_at',
        'status'
    ];

    public function technological()
    {
        return $this->belongsTo(Technological::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
