<?php

namespace App;

use App\AirConditioner;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'in_charge',
        'maintenance_in_charge',
        'description',
        'cost',
        'maintenance_date'
    ];

    public function airConditioner()
    {
        return $this->belongsTo(AirConditioner::class);
    }
}
