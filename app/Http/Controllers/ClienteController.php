<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('clientes.listado', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
    'nombres' => 'required|string|max:255',
    'apellido_paterno' => 'required|string|max:255',
    'apellido_materno' => 'nullable|string|max:255',
    'celular' => 'required|string|max:20',
    'correo' => 'required|email|unique:cliente,correo', 
    'direccion' => 'required|string',
    'estado' => 'required|in:activo,inactivo,pendiente',
    'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
]);

        $cliente = new Cliente();
        $cliente->nombres = $request->nombres;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->estado = $request->estado;
        $cliente->save(); 

        if ($request->hasFile('imagen')) {
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'clientes_' . $cliente->id . '.' . $extension;
            
            $path = $request->file('imagen')->storeAs('clientes', $nombreImagen, 'public');
            $cliente->imagen = $path;
            $cliente->save(); 
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.formulario', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
{
    $request->validate([
        'nombres' => 'required|string|max:255',
        'apellido_paterno' => 'required|string|max:255',
        'apellido_materno' => 'nullable|string|max:255',
        'celular' => 'required|string|max:20',
        'correo' => 'required|email|unique:cliente,correo,' . $cliente->id, 
        'direccion' => 'required|string',
        'estado' => 'required|in:activo,inactivo,pendiente',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

        $cliente->nombres = $request->nombres;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->estado = $request->estado;

        if ($request->hasFile('imagen')) {
            if ($cliente->imagen && Storage::disk('public')->exists($cliente->imagen)) {
                Storage::disk('public')->delete($cliente->imagen);
            }
            
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreImagen = 'clientes_' . $cliente->id . '.' . $extension;
            $path = $request->file('imagen')->storeAs('clientes', $nombreImagen, 'public');
            $cliente->imagen = $path;
        }

        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito');
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->imagen && Storage::disk('public')->exists($cliente->imagen)) {
            Storage::disk('public')->delete($cliente->imagen);
        }
        
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }
}