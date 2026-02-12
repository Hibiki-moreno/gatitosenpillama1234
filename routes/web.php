<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\ReparadorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('layouts.app'))->name('home');


/*
|--------------------------------------------------------------------------
| MAPA / GEOLOCALIZACIÓN
|--------------------------------------------------------------------------
*/
Route::view('/mapa', 'mapa.mapa')->name('mapa');
Route::post('/location', [LocationController::class, 'store'])->name('location.store');


/*
|--------------------------------------------------------------------------
| CLIENTES
|--------------------------------------------------------------------------
*/
Route::prefix('clientes')->name('clientes.')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('index');
    Route::get('/crear', [ClienteController::class, 'create'])->name('create');
    Route::post('/', [ClienteController::class, 'store'])->name('store');
    Route::get('/{cliente}/editar', [ClienteController::class, 'edit'])->name('edit');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('update');
    Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('destroy');
});


/*
|--------------------------------------------------------------------------
| EQUIPOS
|--------------------------------------------------------------------------
*/
Route::prefix('equipos')->name('equipos.')->group(function () {
    Route::get('/', [EquipoController::class, 'index'])->name('index');
    Route::get('/crear', [EquipoController::class, 'create'])->name('create');
    Route::post('/', [EquipoController::class, 'store'])->name('store');
    Route::get('/{equipo}/editar', [EquipoController::class, 'edit'])->name('edit');
    Route::put('/{equipo}', [EquipoController::class, 'update'])->name('update');
    Route::delete('/{equipo}', [EquipoController::class, 'destroy'])->name('destroy');
});


/*
|--------------------------------------------------------------------------
| TICKETS
|--------------------------------------------------------------------------
*/
Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/crear', [TicketController::class, 'create'])->name('create');
    Route::post('/', [TicketController::class, 'store'])->name('store');
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
    Route::get('/{ticket}/editar', [TicketController::class, 'edit'])->name('edit');
    Route::put('/{ticket}', [TicketController::class, 'update'])->name('update');
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy');

    // RUTA PARA EVIDENCIAS DE UN TICKET
    Route::post('/tickets/{ticket}/evidencias', [TicketController::class, 'guardarEvidencia'])
    ->name('tickets.evidencias.store');
    Route::get('/{ticket}/evidencias', [TicketController::class, 'crearEvidencia'])->name('evidencia');
});


/*
|--------------------------------------------------------------------------
| EVIDENCIAS (GENÉRICAS)
|--------------------------------------------------------------------------
*/
Route::prefix('evidencias')->name('evidencias.')->group(function () {
    Route::get('/', [EvidenciaController::class, 'index'])->name('index');
    Route::get('/crear', [EvidenciaController::class, 'create'])->name('create');
    Route::post('/', [EvidenciaController::class, 'store'])->name('store');
    Route::delete('/{evidencia}', [EvidenciaController::class, 'destroy'])->name('destroy');
});


/*
|--------------------------------------------------------------------------
| REPARADORES
|--------------------------------------------------------------------------
*/
Route::prefix('reparadores')->name('reparadores.')->group(function () {
    Route::get('/', [ReparadorController::class, 'index'])->name('index');
    Route::get('/crear', [ReparadorController::class, 'create'])->name('create');
    Route::post('/', [ReparadorController::class, 'store'])->name('store');
    Route::get('/{reparador}/editar', [ReparadorController::class, 'edit'])->name('edit');
    Route::put('/{reparador}', [ReparadorController::class, 'update'])->name('update');
    Route::delete('/{reparador}', [ReparadorController::class, 'destroy'])->name('destroy');
});


/*
|--------------------------------------------------------------------------
| MATERIALES
|--------------------------------------------------------------------------
*/
Route::prefix('materiales')->name('materiales.')->group(function () {
    Route::get('/', [MaterialesController::class, 'index'])->name('index');
    Route::get('/crear', [MaterialesController::class, 'create'])->name('create');
    Route::post('/', [MaterialesController::class, 'store'])->name('store');
    Route::get('/{material}/editar', [MaterialesController::class, 'edit'])->name('edit');
    Route::put('/{material}', [MaterialesController::class, 'update'])->name('update');
    Route::delete('/{material}', [MaterialesController::class, 'destroy'])->name('destroy');
});
