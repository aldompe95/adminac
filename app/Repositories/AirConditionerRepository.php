<?php
namespace App\Repositories;

use App\Technological;
use App\AirConditioner;


class AirConditionerRepository
{
    public function forTechnological(Technological $technological)
    {
        return AirConditioner::where('technological_id', $technological->id)
        			->orderBy('created_at', 'asc')
                    ->get();
    }
}