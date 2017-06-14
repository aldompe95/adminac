<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActiveAir;
use App\Sensor;
use App\ActiveSensor;
use App\Repositories\ActiveSensorRepository;
use App\Http\Requests\ActiveSensorRequest;

class ActiveSensorController extends Controller
{
    protected $sensors;

    public function __construct(ActiveSensorRepository $sensors)
    {
        $this->middleware('auth');

        $this->sensors = $sensors;
    }

    public function index(Request $request, $id)
    {
        $air = ActiveAir::find($id);
        $activeSensors = $this->sensors->forAir($air);
        $sensor = array();
        $inactiveSensors = Sensor::where('status', 0)->get();
        $i = 0;
        foreach ($activeSensors as $activeSensor) {
            $sensor[$i] = Sensor::find($activeSensor->sensor_id);
            $i++;
        }
        return view('activeSensors.index', [
            'activeSensors' => $activeSensors,
            'inactiveSensors' => $inactiveSensors,
            'sensors' => $sensor,
            'id' => $id
        ]);
    }

    public function store(ActiveSensorRequest $request)
    {
        foreach ($request->sensor as $sensor) {    
            $asign = ActiveAir::find($request->id)->activeSensor()->create([
                'sensor_id' => $sensor,
                'status' => 1
            ]);
            if ($asign) {
                $updateStatus = Sensor::find($sensor);
                $updateStatus->status = 1;
                $updateStatus->save();
            }
        }
        $request->session()->flash('alert-success', 'Sensor asignado satisfactoriamente');
        return redirect('/active/'.$request->id);
    }

    public function remove(Request $request, $id, $sensorId, $airId)
    {   
        $updateStatusAir = Sensor::find($sensorId);
        $updateStatusAir->status = 0;
        $updateStatusActive = ActiveSensor::find($id);
        $updateStatusActive->status = 0;
        $updateStatusAir->save();
        $updateStatusActive->save();
        $request->session()->flash('alert-success', 'Sensor removido satisfactoriamente');
        return redirect('/active/'.$airId);
    }
}
