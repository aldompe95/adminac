<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maintenance;
use App\AirConditioner;
use App\Http\Request\MaintenanceCreateRequest;
use App\Repositories\MaintenanceRepository;

class MaintenanceController extends Controller
{
    protected $maintenances;

    public function __construct(MaintenanceRepository $maintenances)
    {
        $this->middleware('auth');

        $this->maintenances = $maintenances;
    }

     public function index(Request $request, $id)
    {
        $air = AirConditioner::find($id);
        return view('maintenances.index', [
            'maintenances' => $this->maintenances->forAirConditioner($air),
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->session()->flash('alert-success', 'Mantenimiento creado satisfactoriamente');
        AirConditioner::find($request->id)->maintenance()->create([
            'in_charge' => $request->in_charge,
            'maintenance_in_charge' => $request->maintenance_in_charge,
            'description' => $request->description,
            'cost' => $request->cost,
            'maintenance_date' => $request->maintenance_date
        ]);
        return redirect('/air/'.$request->id);
    }
}
