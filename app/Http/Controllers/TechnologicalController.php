<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TechnologicalCreateRequest;
use App\Repositories\TechnologicalRepository;
use Auth;

class TechnologicalController extends Controller
{
    protected $technological;

    public function __construct(TechnologicalRepository $technological) {
        $this->middleware('auth');

        $this->technological = $technological;
    }

    public function index(Request $request)
    {
        return view('technologicals.index', [
            'technological' => $this->technological->forUser($request->user())
        ]);
    }

    public function store(TechnologicalCreateRequest $request)
    {
        $user = Auth::user();
        if (is_null($user->technological()->first())) {
            $request->session()->flash('alert-success', 'Tecnologico creado satisfactoriamente');
            $request->user()->technological()->create([
                'name' => $request->name,
                'it_key' => $request->it_key
            ]);
            // redirect
            return redirect('/technologicals');
        }
        $request->session()->flash('alert-success', 'Ya se ha creado un tecnologico para este usuario');
        return redirect('/technologicals');
    }

    public function destroy($id)
    {
        //
    }
}
