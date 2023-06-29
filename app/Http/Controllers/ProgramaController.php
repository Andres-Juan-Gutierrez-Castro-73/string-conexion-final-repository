<?php

namespace App\Http\Controllers;

use App\Models\Cadena;
use App\Models\Programa;
use Illuminate\Http\Request;


class ProgramaController extends Controller
{
    
    public function index()
    {
        $programas = Programa::paginate();

        return view('programa.index', compact('programas'))
            ->with('i', (request()->input('page', 1) - 1) * $programas->perPage());
    }

    
    public function create()
    {
        $programa = new Programa();
        //MOSTRAMOS LOS DATOS QUE QUEREMOS EN LUGAR DEL ID EN LA FUNCION CREATE
        $cadenas = Cadena::pluck('nombre_cadena', 'id');
        return view('programa.create', compact('programa', 'cadenas'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Programa::$rules);

        $programa = Programa::create($request->all());

        return redirect()->route('programas.index')
            ->with('success', 'Programa created successfully.');
    }

    
    public function show($id)
    {
        $programa = Programa::find($id);

        return view('programa.show', compact('programa'));
    }

    
    public function edit($id)
    {
        $programa = Programa::find($id);
        //MOSTRAMOS LOS DATOS QUE QUEREMOS EN LUGAR DEL ID EN LA FUNCION CREATE
        $cadenas = Cadena::pluck('nombre_cadena', 'id');
        return view('programa.edit', compact('programa', 'cadenas'));
    }

    
    public function update(Request $request, Programa $programa)
    {
        request()->validate(Programa::$rules);

        $programa->update($request->all());

        return redirect()->route('programas.index')
            ->with('success', 'Programa updated successfully');
    }

    
    public function destroy($id)
    {
        $programa = Programa::find($id)->delete();

        return redirect()->route('programas.index')
            ->with('success', 'Programa deleted successfully');
    }
}
