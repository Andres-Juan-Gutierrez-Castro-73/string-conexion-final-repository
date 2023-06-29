<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Proyecto;
use Illuminate\Http\Request;


class ProyectoController extends Controller
{
    
    public function index()
    {
        $proyectos = Proyecto::paginate();

        return view('proyecto.index', compact('proyectos'))
            ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }

    
    public function create()
    {
        $proyecto = new Proyecto();
        //LLAMAMOS EL NOMBRE DEL EQUIPO CREADOR EN LUGAR DEL ID
        $equipos = Equipo::pluck('nombre_equipo', 'id');
        return view('proyecto.create', compact('proyecto', 'equipos'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto created successfully.');
    }

    
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.show', compact('proyecto'));
    }

    
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        //LLAMAMOS EL NOMBRE DEL EQUIPO CREADOR EN LUGAR DEL ID
        $equipos = Equipo::pluck('nombre_equipo', 'id');
        return view('proyecto.edit', compact('proyecto', 'equipos'));
    }

    
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto updated successfully');
    }

    
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto deleted successfully');
    }
}
