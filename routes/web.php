<?php
use Illuminate\Support\Facades\Route;
use App\Models\Equipo;

// Ruta principal
Route::get('/', function () {
    return view('layouts.app');
});

// CLIENTES
Route::get('/clientes', function () {
    return view('clientes.listado');
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

// TICKETS
Route::get('/tickets', function () {
    return view('tickets.listado');
});

Route::get('/tickets/crear', function () {
    return view('tickets.formulario');
});

// REPARADORES
Route::get('/reparadores', function () {
    return view('reparadores.listado');
});

Route::get('/reparadores/crear', function () {
    return view('reparadores.formulario');
});

// MATERIALES
Route::get('/materiales', function () {
    return view('materiales.listado');
});

Route::get('/materiales/crear', function () {
    return view('materiales.formulario');
});

// EVIDENCIAS
Route::get('/evidencias', function () {
    return view('evidencias.listado');
});

Route::get('/evidencias/crear', function () {
    return view('evidencias.formulario');
});


