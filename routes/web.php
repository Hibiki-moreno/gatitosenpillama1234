<?php

use Illuminate\Support\Facades\Route;
use App\Models\Equipo;
use App\Models\Cliente;

// Ruta principal
Route::get('/', function () {
    return view('layouts.app');
});

// CLIENTES
Route::get('/clientes', function () {
    $clientes = Cliente::all();
    return view('clientes.listado', compact('clientes'));
});

Route::get('/clientes/crear', function () {
    return view('clientes.formulario');
});

// EQUIPOS
Route::get('/equipos', function () {
    $equipos = Equipo::all();
    return view('equipos.listado', compact('equipos'));
});

Route::get('/equipos/crear', function () {
    return view('equipos.formulario');
});
