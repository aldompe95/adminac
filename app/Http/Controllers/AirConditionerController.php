<?php

namespace App\Http\Controllers;

use Auth;
use App\AirConditioner;
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

    public function index(Request $request)
    {
        $technological = $request->user()->technological;
        return view('airConditioners.index', [
            'airs' => $this->airs->forTechnological($technological)
        ]);
    }

    public function store(AirConditionerCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'Aire acondicionado creado satisfactoriamente');
        $request->user()->technological->air()->create([
            'brand' => $request->brand,
            'model' => $request->model,
            'purchase_at' => $request->purchase_at,
            'status' => 0
        ]);
        return redirect('/airs');
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
