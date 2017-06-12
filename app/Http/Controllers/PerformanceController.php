<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performance;
use App\ActiveAir;
use App\Http\Request\PerformanceCreateRequest;
use App\Repositories\PerformanceRepository;

class PerformanceController extends Controller
{
    protected $performances;

    public function __construct(PerformanceRepository $performances)
    {
        $this->middleware('auth');
        $this->performances = $performances;
    }

    public function index(Request $request, $id)
    {
        $activeAir = ActiveAir::find($id);
        return view('performances.index', [
            'performances' => $this->performances->forActiveAir($activeAir),
            'id' => $id
        ]);
    }

    public function store(PerformanceCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'Registro realizado satisfactoriamente');
        ActiveAir::find($request->id)->performance()->create([
            'day' => $request->day,
            'switched_on_hour' => $request->switched_on_hour,
            'switched_off_hour' => $request->switched_off_hour
        ]);
        return redirect('/activeAir/'.$request->id);
    }
}
