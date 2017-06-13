<?php

namespace App\Http\Controllers;

use Auth;
use App\ActiveAir;
use App\AirConditioner;
use App\Area;
use App\Repositories\ActiveAirRepository;
use App\Http\Requests\ActiveAirAssignRequest;
use Illuminate\Http\Request;

class ActiveAirController extends Controller
{
    protected $airs;

    public function __construct(ActiveAirRepository $airs)
    {
        $this->middleware('auth');

        $this->airs = $airs;
    }

    public function index(Request $request, $id)
    {
        $technological = $request->user()->technological;
        $area = Area::find($id);
        $activeAirs = $this->airs->forArea($area);
        $airConditioner = array();
        $i = 0;
        foreach ($activeAirs as $activeAir) {
            $airConditioner[$i] = AirConditioner::find($activeAir->air_conditioner_id);
            $i++;
        }
        return view('activeAirs.index', [
            'airs' => $activeAirs,
            'inactive_airs' => $this->airs->inactive($technological),
            'air_conditioners' => $airConditioner,
            'id' => $id
        ]);
    }

    public function store(ActiveAirAssignRequest $request)
    {
        foreach ($request->air as $air) {
            $asign = Area::find($request->id)->activeAir()->create([
                'air_conditioner_id' => $air,
                'status' => 1
            ]);
            if ($asign) {
                $updateStatus = AirConditioner::find($air);
                $updateStatus->status = 1;
                $updateStatus->save();
            }
        }
        $request->session()->flash('alert-success', 'Aire acondicionado asignado satisfactoriamente');
        return redirect('/area/'.$request->id);
    }
    public function removeAir(Request $request, $id, $airId, $areaId)
    {   
        $updateStatusAir = AirConditioner::find($airId);
        $updateStatusAir->status = 0;
        $updateStatusActive = ActiveAir::find($id);
        $updateStatusActive->status = 0;
        $updateStatusAir->save();
        $updateStatusActive->save();
        // Tenemos que cambiar el valor del status del sensor
        $request->session()->flash('alert-success', 'Aire acondicionado removido satisfactoriamente');
        return redirect('/area/'.$areaId);
    }
}
