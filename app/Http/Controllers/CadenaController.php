<?php

namespace App\Http\Controllers;

use App\Models\Cadena;
use Illuminate\Http\Request;


class CadenaController extends Controller
{
   
    public function index()
    {
        $cadenas = Cadena::paginate();

        return view('cadena.index', compact('cadenas'))
            ->with('i', (request()->input('page', 1) - 1) * $cadenas->perPage());
    }

    
    public function create()
    {
        $cadena = new Cadena();
        return view('cadena.create', compact('cadena'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Cadena::$rules);

        $cadena = Cadena::create($request->all());

        return redirect()->route('cadenas.index')
            ->with('success', 'Cadena created successfully.');
    }

    
    public function show($id)
    {
        $cadena = Cadena::find($id);

        return view('cadena.show', compact('cadena'));
    }

    
    public function edit($id)
    {
        $cadena = Cadena::find($id);

        return view('cadena.edit', compact('cadena'));
    }

    
    public function update(Request $request, Cadena $cadena)
    {
        request()->validate(Cadena::$rules);

        $cadena->update($request->all());

        return redirect()->route('cadenas.index')
            ->with('success', 'Cadena updated successfully');
    }

    
    public function destroy($id)
    {
        $cadena = Cadena::find($id)->delete();

        return redirect()->route('cadenas.index')
            ->with('success', 'Cadena deleted successfully');
    }
}
