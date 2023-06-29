<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate();
        $puedeEditar = true; // Valor predeterminado para el usuario actual

        // Verificar si el usuario actual está involucrado en algún equipo
        if (Auth::check()) {
            $userId = Auth::id();

            $equiposUsuario = DB::table('equipos')
                ->join('users', 'equipos.correo_usuario_creador', '=', 'users.email')
                ->where('users.id', $userId)
                ->pluck('equipos.id')
                ->toArray();

            $puedeEditar = count($equiposUsuario) > 0;
        }

        return view('equipo.index', compact('equipos', 'puedeEditar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Verificar el rol del usuario actual
        if (Auth::user()->rol == 'admin') {
            // Si el usuario es administrador, redirigir o realizar alguna acción
        } else {
            $equipo = new Equipo();
            $usuarioActivo = Auth::user();
            $usuariosAprendiz = User::where('rol', 'aprendiz')->where('id', '!=', $usuarioActivo->id)->pluck('name', 'id');
            return view('equipo.create', compact('equipo', 'usuarioActivo', 'usuariosAprendiz'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_equipo' => 'required',
            'nombre_integrante1' => 'required',
            'nombre_integrante2' => 'required',
            'nombre_integrante3' => 'required',
            'servicios_ofrecidos' => 'required',
            'diponibilidad' => 'required',
            'correo_usuario_creador' => 'required',
        ]);

        $equipoData = $request->all();
        $equipoData['nombre_integrante1'] = User::find($request->nombre_integrante1)->name;
        $equipoData['nombre_integrante2'] = User::find($request->nombre_integrante2)->name;
        $equipoData['nombre_integrante3'] = User::find($request->nombre_integrante3)->name;

        Equipo::create($equipoData);

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);
        $puedeEditar = true; // Valor predeterminado para el usuario actual

        // Verificar si el usuario actual está involucrado en el equipo y su correo electrónico coincide
        if (Auth::check()) {
            $userId = Auth::id();

            $equipoUsuario = DB::table('equipos')
                ->join('users', 'equipos.correo_usuario_creador', '=', 'users.email')
                ->where('users.id', $userId)
                ->where('equipos.id', $id)
                ->select('equipos.id')
                ->first();

            $puedeEditar = $equipoUsuario !== null;
        }

        return view('equipo.show', compact('equipo', 'puedeEditar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Verificar el rol del usuario actual
        if (Auth::user()->rol == 'admin') {
            // Si el usuario es administrador, redirigir o realizar alguna acción
        } else {
            $equipo = Equipo::find($id);
            $usuarioActivo = Auth::user();
            $usuariosAprendiz = User::where('rol', 'aprendiz')->where('id', '!=', $usuarioActivo->id)->pluck('name', 'id');
            return view('equipo.edit', compact('equipo', 'usuarioActivo', 'usuariosAprendiz'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_equipo' => 'required',
            'nombre_integrante1' => 'required',
            'nombre_integrante2' => 'required',
            'nombre_integrante3' => 'required',
            'servicios_ofrecidos' => 'required',
            'diponibilidad' => 'required',
            'correo_usuario_creador' => 'required',
        ]);

        $equipoData = $request->all();
        $equipoData['nombre_integrante1'] = User::find($request->nombre_integrante1)->name;
        $equipoData['nombre_integrante2'] = User::find($request->nombre_integrante2)->name;
        $equipoData['nombre_integrante3'] = User::find($request->nombre_integrante3)->name;

        $equipo = Equipo::find($id);
        $equipo->update($equipoData);

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        // Verificar el rol del usuario actual
        if (Auth::user()->rol == 'admin') {
            // Si el usuario es administrador, redirigir o realizar alguna acción
        } else {
            $equipo->delete();
            return redirect()->route('equipos.index')->with('success', 'Equipo eliminado exitosamente.');
        }
    }
}
