<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\ReparadorController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('layouts.app');
});

// CLIENTES
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/crear', [ClienteController::class, 'create']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy']);
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit']);
Route::put('/clientes/{cliente}', [ClienteController::class, 'update']);

// EQUIPOS
Route::get('/equipos', [EquipoController::class, 'index']);
Route::get('/equipos/crear', [EquipoController::class, 'create']);
Route::post('/equipos', [EquipoController::class, 'store']);
Route::get('/equipos/{equipo}/editar', [EquipoController::class, 'edit']);
Route::put('/equipos/{equipo}', [EquipoController::class, 'update']);
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy']);

// TICKETS NO ESTA LISTA
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/crear', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);

// REPARADORES
Route::get('/reparadores', [ReparadorController::class, 'index']);
Route::get('/reparadores/crear', [ReparadorController::class, 'create']);
Route::post('/reparadores', [ReparadorController::class, 'store']);
Route::get('/reparadores/{id}/editar', [ReparadorController::class, 'edit']);
Route::put('/reparadores/{id}', [ReparadorController::class, 'update']);
Route::delete('/reparadores/{id}', [ReparadorController::class, 'destroy']);

// MATERIALES
Route::get('/materiales', [MaterialesController::class, 'index']);
Route::get('/materiales/crear', [MaterialesController::class, 'create']);
Route::post('/materiales', [MaterialesController::class, 'store']);
Route::get('/materiales/{id}/editar', [MaterialesController::class, 'edit']);
Route::put('/materiales/{id}', [MaterialesController::class, 'update']);
Route::delete('/materiales/{id}', [MaterialesController::class, 'destroy']);

// EVIDENCIAS TICKETS QUE AUN NO QUEDAAA
Route::get('/tickets/create', [EvidenciaController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [EvidenciaController::class, 'store'])->name('tickets.store');
Route::get('/tickets', [EvidenciaController::class, 'index'])->name('tickets.index');

