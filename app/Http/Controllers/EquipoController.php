<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\EquipoImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('imagenes')->paginate(10);
        return view('equipos.listado', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'ano' => 'required|integer|min:2000|max:' . date('Y'),
            'condicion_fisica' => 'required|in:excelente,bueno,regular,malo',
            'color' => 'required|string|max:30',
            'imagenes' => 'required|array|min:3|max:3',
            'imagenes.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $equipo = Equipo::create([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'condicion_fisica' => $request->condicion_fisica,
            'color' => $request->color
        ]);

        foreach ($request->file('imagenes') as $index => $imagen) {
            $extension = $imagen->getClientOriginalExtension();
            $nombreImagen = 'equipos_' . $equipo->id . '_' . ($index + 1) . '.' . $extension;
            
            $path = $imagen->storeAs('equipos', $nombreImagen, 'public');
            
            EquipoImagen::create([
                'equipo_id' => $equipo->id,
                'imagen' => $path,
                'orden' => $index + 1
            ]);
        }

        return redirect()->route('equipos.index')->with('success', 'Equipo creado con 3 imágenes');
    }

    public function show(Equipo $equipo)
    {
        $equipo->load('imagenes');
        return view('equipos.show', compact('equipo'));
    }

    public function edit(Equipo $equipo)
    {
        $equipo->load('imagenes');
        return view('equipos.formulario', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'ano' => 'required|integer|min:2000|max:' . date('Y'),
            'condicion_fisica' => 'required|in:excelente,bueno,regular,malo',
            'color' => 'required|string|max:30',
            'imagenes' => 'nullable|array|max:3',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $equipo->update([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'ano' => $request->ano,
            'condicion_fisica' => $request->condicion_fisica,
            'color' => $request->color
        ]);

        if ($request->hasFile('imagenes')) {
            foreach ($equipo->imagenes as $img) {
                if (Storage::disk('public')->exists($img->imagen)) {
                    Storage::disk('public')->delete($img->imagen);
                }
                $img->delete();
            }
            
            foreach ($request->file('imagenes') as $index => $imagen) {
                $extension = $imagen->getClientOriginalExtension();
                $nombreImagen = 'equipos_' . $equipo->id . '_' . ($index + 1) . '.' . $extension;
                
                $path = $imagen->storeAs('equipos', $nombreImagen, 'public');
                
                EquipoImagen::create([
                    'equipo_id' => $equipo->id,
                    'imagen' => $path,
                    'orden' => $index + 1
                ]);
            }
        }

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado');
    }

    public function destroy(Equipo $equipo)
    {
        foreach ($equipo->imagenes as $imagen) {
            if (Storage::disk('public')->exists($imagen->imagen)) {
                Storage::disk('public')->delete($imagen->imagen);
            }
        }
        
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado');
    }
}