<?php
namespace App\Repositories;

use App\Building;
use App\Area;

class AreaRepository
{
    public function forBuilding(Building $building)
    {
        return Area::where('building_id', $building->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}