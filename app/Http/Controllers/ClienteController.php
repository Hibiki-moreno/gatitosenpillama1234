<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // LISTADO
    public function index()
    {
        $clientes = Cliente::all(); // traer clientes

        return view('clientes.listado', compact('clientes'));
    }

    // FORMULARIO
    public function create()
    {
        return view('clientes.formulario');
    }

    // GUARDAR
    public function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect('/clientes');
    }
    public function destroy(Cliente $cliente)
{
    $cliente->delete();
    return redirect('/clientes');
}
public function edit(Cliente $cliente)
{
    return view('clientes.formulario', compact('cliente'));
}

public function update(Request $request, Cliente $cliente)
{
    $cliente->update($request->all());
    return redirect('/clientes');
}

}
