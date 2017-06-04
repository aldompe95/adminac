<?php
namespace App\Repositories;

use App\Maintenance;
use App\AirConditioner;

/**
* 
*/
class MaintenanceRepository
{
    
    public function forAirConditioner(AirConditioner $air)
    {
        return Maintenance::where('air_conditioner_id', $air->id)->orderBy('maintenance_date', 'asc')->get();
    }
}