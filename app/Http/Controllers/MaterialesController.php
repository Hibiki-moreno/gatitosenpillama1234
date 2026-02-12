<?php

namespace App\Http\Controllers;

use App\Models\Materiales;
use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    public function index()
    {
        $materiales = Materiales::all();
        return view('materiales/listado', compact('materiales'));
    }

    public function create()
    {
        return view('materiales/formulario');
    }

    // GUARDAR
    public function store(Request $request)
    {
        Materiales::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'precio_unitario' => $request->precio_unitario,
            'cantidad_inicial' => $request->cantidad_inicial,
            'existencia' => $request->cantidad_inicial, // Mismo que cantidad_inicial
            'stock_minimo' => $request->stock_minimo,
            'estado' => $request->estado,
            'ubicacion_almacen' => $request->ubicacion_almacen,
        ]);

        return redirect('/materiales');
    }

    // EDITAR
    public function edit($id)
    {
        $material = Materiales::findOrFail($id);
        return view('materiales/formulario', compact('material'));
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $material = Materiales::findOrFail($id);
        
        $material->update([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'precio_unitario' => $request->precio_unitario,
            'cantidad_inicial' => $request->cantidad_inicial,
            'existencia' => $request->existencia, // En edición puede ser diferente
            'stock_minimo' => $request->stock_minimo,
            'estado' => $request->estado,
            'ubicacion_almacen' => $request->ubicacion_almacen,
        ]);

        return redirect('/materiales');
    }

    // ELIMINAR
    public function destroy($id)
    {
        $material = Materiales::findOrFail($id);
        $material->delete();
        return redirect('/materiales');
    }
}