<?php
namespace App\Repositories;

use App\Area;
use App\ActiveAir;
use App\AirConditioner;
use App\Technological;

class ActiveAirRepository
{
    public function forArea(Area $area)
    {
        return ActiveAir::where('area_id', $area->id)
        			->orderBy('created_at', 'asc')
                    ->get();
    }

    public function inactive(Technological $technological)
    {
        return AirConditioner::where('technological_id', $technological->id)
        			->where('status', 0)
        			->orderBy('created_at', 'asc')
                    ->get();
    }
}