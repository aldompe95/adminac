<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ActiveAir;

class ActiveSensor extends Model
{
    protected $fillable = [
        'sensor_id',
        'status'
    ];

    public function activeAir()
    {
        return $this->belongsTo(ActiveAir::class);
    }
}
