<?php

namespace App\Repositories;

use App\Performance;
use App\ActiveAir;

class PerformanceRepository
{
    public function forActiveAir(ActiveAir $activeAir)
    {
        return Performance::where('active_air_id', $activeAir->id)->orderBy('id', 'asc')->get();
    }
}