<?php

namespace App\Repositories;

use App\Performance;
use App\ActiveAir;
use App\Maintenance;

class PerformanceRepository
{
    public function forActiveAir(ActiveAir $activeAir)
    {
        return Performance::where('active_air_id', $activeAir->id)->orderBy('id', 'asc')->get();
    }

    public function hours(ActiveAir $activeAir)
    {
        $date = Maintenance::where('air_conditioner_id', $activeAir->air_conditioner_id)->orderBy('maintenance_date', 'desc')->first();
        return Performance::where('day', '>', $date->maintenance_date)->where('active_air_id', $activeAir->id)->get();
    }
}