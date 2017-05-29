<?php

namespace App\Http\Controllers;

use Auth;
use App\Technological;
use App\Building;
use Illuminate\Http\Request;
use App\Http\Requests\BuildingCreateRequest;
use App\Repositories\BuildingRepository;

class BuildingController extends Controller
{   
    protected $buildings;

    public function __construct(BuildingRepository $buildings)
    {
        $this->middleware('auth');

        $this->buildings = $buildings;
    }

    public function index(Request $request)
    {
        $technological = $request->user()->technological;
        return view('buildings.index', [
            'tecnological' => $technological->name,
            'buildings' => $this->buildings->forTechnological($technological)
        ]);
    }

    public function store(BuildingCreateRequest $request)
    {
        $request->session()->flash('alert-success', 'Edificio creado satisfactoriamente');
        $request->user()->technological->building()->create([
            'name' => $request->name
        ]);
        // redirect
        return redirect('/buildings');
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
