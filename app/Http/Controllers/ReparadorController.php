<?php

namespace App\Http\Controllers;

use App\Models\Reparador;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class ReparadorController extends Controller
{
    public function index()
    {
        $reparadores = Reparador::with('especialidad')->get();
        return view('reparadores.listado', compact('reparadores'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('reparadores.formulario', compact('especialidades'));
    }

    public function store(Request $request)
    {
        Reparador::create([
            'nombres' => $request->nombres,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'correo' => $request->correo,
            'celular' => $request->celular,
            'especialidad_id' => $request->especialidad_id,
            'anios_experiencia' => $request->anios_experiencia,
            'turno' => $request->turno,
            'estado' => $request->estado,
        ]);

        return redirect('/reparadores');
    }

    // EDITAR
    public function edit($id)
    {
        $reparador = Reparador::findOrFail($id);
        $especialidades = Especialidad::all();
        return view('reparadores.formulario', compact('reparador', 'especialidades'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $reparador = Reparador::findOrFail($id);
        
        $reparador->update([
            'nombres' => $request->nombres,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'correo' => $request->correo,
            'celular' => $request->celular,
            'especialidad_id' => $request->especialidad_id,
            'anios_experiencia' => $request->anios_experiencia,
            'turno' => $request->turno,
            'estado' => $request->estado,
        ]);

        return redirect('/reparadores');
    }

    // ELIMINAR
    public function destroy($id)
    {
        $reparador = Reparador::findOrFail($id);
        $reparador->delete();
        return redirect('/reparadores');
    }
}