<?php
namespace App\Repositories;

use App\Area;
use App\AirConditioner;


class AirConditionerRepository
{
    public function forArea(Area $area)
    {
        return AirConditioner::where('area_id', $area->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}