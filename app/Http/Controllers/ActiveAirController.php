<?php

namespace App\Http\Controllers;

use Auth;
use App\ActiveAir;
use App\AirConditioner;
use App\Area;
use App\Repositories\ActiveAirRepository;
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
        return view('activeAirs.index', [
            'airs' => $this->airs->forArea($area),
            'inactive_airs' => $this->airs->inactive($technological),
            'id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->session()->flash('alert-success', 'Aire acondicionado asignado satisfactoriamente');
        foreach ($request->air as $air) {
            $asign = Area::find($request->id)->activeAir()->create([
                'air_conditioner_id' => $air
            ]);
            if ($asign) {
                $updateStatus = AirConditioner::find($air);
                $updateStatus->status = 1;
                $updateStatus->save();
            }
            return redirect('/area/'.$request->id);
        }
    }
}
