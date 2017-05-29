<?php
namespace App\Repositories;

use App\Technological;
use App\Building;

class BuildingRepository
{
    public function forTechnological(Technological $technological)
    {
        return Building::where('technological_id', $technological->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}