<?php

namespace App\Http\Controllers;

use App\Models\Reparador;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReparadorController extends Controller
{
    public function index()
    {
        $reparadores = Reparador::with('especialidad')->paginate(10);
        return view('reparadores.listado', compact('reparadores'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('reparadores.formulario', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'correo' => 'required|email|unique:reparadores,correo',
            'celular' => 'required|string|max:20',
            'especialidad_id' => 'required|exists:especialidades,id',
            'anios_experiencia' => 'nullable|integer|min:0|max:50',
            'turno' => 'required|in:matutino,vespertino,nocturno,mixto',
            'estado' => 'required|in:activo,inactivo,vacaciones,licencia',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $reparador = new Reparador();
        $reparador->nombres = $request->nombres;
        $reparador->apellido_paterno = $request->apellido_paterno;
        $reparador->apellido_materno = $request->apellido_materno;
        $reparador->correo = $request->correo;
        $reparador->celular = $request->celular;
        $reparador->especialidad_id = $request->especialidad_id;
        $reparador->anios_experiencia = $request->anios_experiencia ?? 0;
        $reparador->turno = $request->turno;
        $reparador->estado = $request->estado;
        $reparador->save();

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'reparadores_' . $reparador->id . '.' . $extension;
            $path = $request->file('imagen')->storeAs('reparadores', $nombreImagen, 'public');
            $reparador->imagen = $path;
            $reparador->save();
        }

        return redirect()->route('reparadores.index')->with('success', 'Reparador creado con éxito');
    }

    public function show(Reparador $reparador)
    {
        $reparador->load('especialidad');
        return view('reparadores.show', compact('reparador'));
    }

    public function edit(Reparador $reparador)
    {
        $especialidades = Especialidad::all();
        return view('reparadores.formulario', compact('reparador', 'especialidades'));
    }

    public function update(Request $request, Reparador $reparador)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'correo' => 'required|email|unique:reparadores,correo,' . $reparador->id,
            'celular' => 'required|string|max:20',
            'especialidad_id' => 'required|exists:especialidades,id',
            'anios_experiencia' => 'nullable|integer|min:0|max:50',
            'turno' => 'required|in:matutino,vespertino,nocturno,mixto',
            'estado' => 'required|in:activo,inactivo,vacaciones,licencia',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $reparador->nombres = $request->nombres;
        $reparador->apellido_paterno = $request->apellido_paterno;
        $reparador->apellido_materno = $request->apellido_materno;
        $reparador->correo = $request->correo;
        $reparador->celular = $request->celular;
        $reparador->especialidad_id = $request->especialidad_id;
        $reparador->anios_experiencia = $request->anios_experiencia ?? 0;
        $reparador->turno = $request->turno;
        $reparador->estado = $request->estado;

        if ($request->hasFile('imagen')) {
            if ($reparador->imagen && Storage::disk('public')->exists($reparador->imagen)) {
                Storage::disk('public')->delete($reparador->imagen);
            }
            
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'reparadores_' . $reparador->id . '.' . $extension;
            $path = $request->file('imagen')->storeAs('reparadores', $nombreImagen, 'public');
            $reparador->imagen = $path;
        }

        $reparador->save();

        return redirect()->route('reparadores.index')->with('success', 'Reparador actualizado con éxito');
    }

    public function destroy(Reparador $reparador)
    {
        if ($reparador->imagen && Storage::disk('public')->exists($reparador->imagen)) {
            Storage::disk('public')->delete($reparador->imagen);
        }
        
        $reparador->delete();
        return redirect()->route('reparadores.index')->with('success', 'Reparador eliminado con éxito');
    }
}