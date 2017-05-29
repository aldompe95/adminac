<?php

namespace App\Http\Controllers;

use Auth;
use App\AirConditioner;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AirConditionerCreateRequest;
use App\Repositories\AirConditionerRepository;

class AirConditionerController extends Controller
{
    protected $airs;

    public function __construct(AirConditionerRepository $airs)
    {
        $this->middleware('auth');

        $this->airs = $airs;
    }

     public function index(Request $request, $id)
    {
        $area = Area::find($id);
        return view('airConditioners.index', [
            'airs' => $this->airs->forArea($area),
            'id' => $id
        ]);
    }

    public function store(AirConditionerCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'Aire acondicionado creado satisfactoriamente');
        Area::find($request->id)->airConditioner()->create([
            'brand' => $request->brand,
            'model' => $request->model,
            'purchase_at' => $request->purchase_at,
            'remission_at' => $request->remission_at
        ]);
        return redirect('/area/'.$request->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
