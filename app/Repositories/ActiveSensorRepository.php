<?php
namespace App\Repositories;


use App\ActiveAir;
use App\ActiveSensor;

class ActiveSensorRepository
{
    public function forAir(ActiveAir $air)
    {
        return $sensor = ActiveSensor::where('active_air_id', $air->id)
                    ->where('status', 1)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}