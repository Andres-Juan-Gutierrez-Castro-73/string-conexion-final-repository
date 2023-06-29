<?php

namespace App\Http\Controllers;

use App\Models\Aprendice;
use App\Models\Cadena;
use App\Models\Programa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AprendiceController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario autenticado actualmente
        $userId = auth()->id();

        // Obtener el aprendiz correspondiente al usuario activo
        $aprendiz = Aprendice::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        if (!$aprendiz) {
            // Redireccionar al método create si no se encontró el aprendiz
            return redirect()->route('aprendices.create');
        }

        return view('aprendice.index', compact('aprendiz'));
    }

    public function create()
    {
        $aprendice = new Aprendice();

        // Obtener el usuario autenticado actualmente
        $user = auth()->user();

        // Crear un array con el ID y el nombre del usuario autenticado
        $usuarios = [$user->id => $user->name];

        $cadenas = Cadena::pluck('nombre_cadena', 'id');
        $programas = Programa::pluck('nombre_programa', 'id');

        return view('aprendice.create', compact('aprendice', 'cadenas', 'programas', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_perfil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la foto de perfil
            // Resto de las reglas de validación
        ]);

        // Asignar el ID del usuario autenticado al campo 'usuario_id'
        $request->merge(['usuario_id' => auth()->id()]);

        // Procesar la foto de perfil si se ha cargado
        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = $request->file('foto_perfil');
            $filename = time() . '.' . $foto_perfil->getClientOriginalExtension();
            $path = $request->file('foto_perfil')->storeAs('public/fotos_perfil', $filename);
            $request->merge(['foto_perfil' => $filename]);
        }

        $aprendice = Aprendice::create($request->all());

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz creado exitosamente.');
    }

    public function show($id)
    {
        $aprendice = Aprendice::find($id);

        return view('aprendice.show', compact('aprendice'));
    }

    public function edit($id)
    {
        $aprendice = Aprendice::find($id);

        $cadenas = Cadena::pluck('nombre_cadena', 'id');
        $programas = Programa::pluck('nombre_programa', 'id');

        // Obtener el usuario autenticado actualmente
        $user = auth()->user();

        // Crear un array con el ID y el nombre del usuario autenticado
        $usuarios = [$user->id => $user->name];

        return view('aprendice.edit', compact('aprendice', 'cadenas', 'programas', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_perfil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la foto de perfil
            // Resto de las reglas de validación
        ]);

        $aprendice = Aprendice::find($id);

        $aprendice->update($request->all());

        // Procesar la foto de perfil si se ha cargado
        if ($request->hasFile('foto_perfil')) {
            $foto_perfil = $request->file('foto_perfil');
            $filename = time() . '.' . $foto_perfil->getClientOriginalExtension();
            $path = $request->file('foto_perfil')->storeAs('public/fotos_perfil', $filename);
            $request->merge(['foto_perfil' => $filename]);

            if ($aprendice->foto_perfil) {
                // Eliminar la foto de perfil anterior si existe
                Storage::delete('public/fotos_perfil/' . $aprendice->foto_perfil);
            }

            $aprendice->update(['foto_perfil' => $filename]);
        }

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $aprendice = Aprendice::find($id);

        if ($aprendice->foto_perfil) {
            // Eliminar la foto de perfil si existe
            Storage::delete('public/fotos_perfil/' . $aprendice->foto_perfil);
        }

        $aprendice->delete();

        return redirect()->route('aprendices.index')->with('success', 'Aprendiz eliminado exitosamente.');
    }
}
