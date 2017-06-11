<?php

namespace App\Repository;

use App\Sensor;

class SensorRepository
{
    public function allSensors()
    {
        return Sensor::orderBy('id','asc');
    }
}