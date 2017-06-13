<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performance;
use App\ActiveAir;
use App\Repositories\PerformanceRepository;
use App\Http\Requests\PerformanceCreateRequest;

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
        $items = $this->performances->hours($activeAir);
        $hours = 0;
        foreach ($items as $item) {
            $hours = $hours + ($item->switched_off_hour - $item->switched_on_hour);
        }
        return view('performances.index', [
            'performances' => $this->performances->forActiveAir($activeAir),
            'hours' => $hours,
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
