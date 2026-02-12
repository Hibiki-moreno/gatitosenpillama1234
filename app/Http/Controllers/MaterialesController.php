<?php

namespace App\Http\Controllers;

use App\Models\Materiales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialesController extends Controller
{
    public function index()
    {
        $materiales = Materiales::paginate(10);
        return view('materiales.listado', compact('materiales'));
    }

    public function create()
    {
        return view('materiales.formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:100',
            'precio_unitario' => 'nullable|numeric|min:0',
            'existencia' => 'required|integer|min:0',
            'estado' => 'required|in:disponible,agotado,en_pedido,descontinuado',
            'categoria' => 'nullable|string|max:255',
            'cantidad_inicial' => 'nullable|integer|min:0',
            'stock_minimo' => 'nullable|integer|min:0',
            'ubicacion_almacen' => 'nullable|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $material = new Materiales();
        $material->nombre = $request->nombre;
        $material->descripcion = $request->descripcion;
        $material->precio_unitario = $request->precio_unitario ?? 0;
        $material->existencia = $request->existencia;
        $material->estado = $request->estado;
        $material->categoria = $request->categoria;
        $material->cantidad_inicial = $request->cantidad_inicial ?? $request->existencia;
        $material->stock_minimo = $request->stock_minimo ?? 5;
        $material->ubicacion_almacen = $request->ubicacion_almacen;
        $material->save();

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'materiales_' . $material->id . '.' . $extension;
            $path = $request->file('imagen')->storeAs('materiales', $nombreImagen, 'public');
            $material->imagen = $path;
            $material->save();
        }

        return redirect()->route('materiales.index')->with('success', 'Material creado con éxito');
    }

    public function show(Materiales $material)
    {
        return view('materiales.show', compact('material'));
    }

    public function edit(Materiales $material)
    {
        return view('materiales.formulario', compact('material'));
    }

    public function update(Request $request, Materiales $material)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:100',
            'precio_unitario' => 'nullable|numeric|min:0',
            'existencia' => 'required|integer|min:0',
            'estado' => 'required|in:disponible,agotado,en_pedido,descontinuado',
            'categoria' => 'nullable|string|max:255',
            'cantidad_inicial' => 'nullable|integer|min:0',
            'stock_minimo' => 'nullable|integer|min:0',
            'ubicacion_almacen' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $material->nombre = $request->nombre;
        $material->descripcion = $request->descripcion;
        $material->precio_unitario = $request->precio_unitario ?? 0;
        $material->existencia = $request->existencia;
        $material->estado = $request->estado;
        $material->categoria = $request->categoria;
        $material->cantidad_inicial = $request->cantidad_inicial ?? $material->cantidad_inicial;
        $material->stock_minimo = $request->stock_minimo ?? 5;
        $material->ubicacion_almacen = $request->ubicacion_almacen;

        if ($request->hasFile('imagen')) {
            if ($material->imagen && Storage::disk('public')->exists($material->imagen)) {
                Storage::disk('public')->delete($material->imagen);
            }
            
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'materiales_' . $material->id . '.' . $extension;
            $path = $request->file('imagen')->storeAs('materiales', $nombreImagen, 'public');
            $material->imagen = $path;
        }

        $material->save();

        return redirect()->route('materiales.index')->with('success', 'Material actualizado con éxito');
    }

    public function destroy(Materiales $material)
    {
        if ($material->imagen && Storage::disk('public')->exists($material->imagen)) {
            Storage::disk('public')->delete($material->imagen);
        }
        
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado con éxito');
    }
}