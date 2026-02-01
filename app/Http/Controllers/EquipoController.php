<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.listado', compact('equipos'));
    }

    // CREAR
    public function create()
    {
        return view('equipos.formulario');
    }

    // GUARDAR
    public function store(Request $request)
    {
        Equipo::create($request->only([
            'modelo',
            'marca',
            'ano',
            'condicion_fisica',
            'color'
        ]));

        return redirect('/equipos');
    }

    // EDITAR
    public function edit(Equipo $equipo)
    {
        return view('equipos.formulario', compact('equipo'));
    }

    // ACTUALIZAR
    public function update(Request $request, Equipo $equipo)
    {
        $equipo->update($request->only([
            'modelo',
            'marca',
            'ano',
            'condicion_fisica',
            'color'
        ]));

        return redirect('/equipos');
    }

    // ELIMINAR
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect('/equipos');
    }
}
