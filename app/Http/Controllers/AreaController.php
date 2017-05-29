<?php

namespace App\Http\Controllers;

use Auth;
use App\Area;
use App\Building;
use Illuminate\Http\Request;
use App\Http\Requests\AreaCreateRequest;
use App\Repositories\AreaRepository;

class AreaController extends Controller
{
    protected $areas;

    public function __construct(AreaRepository $areas)
    {
        $this->middleware('auth');

        $this->areas = $areas;
    }
    
    public function index(Request $request, $id)
    {
        $building = Building::find($id); // Esto es lo mismo que la linea de abajo.
        //$building = $request->user()->technological->building()->find($id);
        return view('areas.index', [
            'areas' => $this->areas->forBuilding($building),
            'id' => $id,
            'building' => $building->name 
        ]);
    }

    public function store(AreaCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'Area creada satisfactoriamente');
        Building::find($request->id)->area()->create([ // Esto es lo mismo que la linea de abajo
        //$request->user()->technological->building()->find($request->id)->area()->create([
            'name' => $request->name
        ]);
        return redirect('/building/'.$request->id);
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
