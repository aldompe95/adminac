<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\Http\Requests\SensorCreateRequest;
use Exception;

class SensorController extends Controller
{

    public function index()
    {
        $sensors = Sensor::all();
        return view('sensors.index')->with('sensors', $sensors);
    }

    public function store(SensorCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'El sensor se ha almacenado correctamente');
        try {
            $sensor = new Sensor();
            $sensor->type = $request->type;
            $sensor->brand = $request->brand;
            $sensor->model = $request->model;
            $sensor->description = $request->description;
            $sensor->save();
            return redirect('/sensors');
        } catch(Exception $e) {
            return "Fatal error - ".$e->getMessage();
        }
    }

    public function destroy($id)
    {
        //
    }
}
