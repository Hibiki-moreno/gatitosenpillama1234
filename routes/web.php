<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\ReparadorController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Ruta principal
Route::get('/', function () {
    return view('layouts.app');
});

// CLIENTES
Route::controller(ClienteController::class)->group(function () {
    Route::get('/clientes', 'index')->name('clientes.index');
    Route::get('/clientes/crear', 'create')->name('clientes.create');
    Route::post('/clientes', 'store')->name('clientes.store');
    Route::get('/clientes/{cliente}', 'show')->name('clientes.show'); // 👈 AGREGADO
    Route::get('/clientes/{cliente}/editar', 'edit')->name('clientes.edit');
    Route::put('/clientes/{cliente}', 'update')->name('clientes.update');
    Route::delete('/clientes/{cliente}', 'destroy')->name('clientes.destroy');
});

// EQUIPOS
// EQUIPOS - CON 3 IMÁGENES
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/equipos/crear', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/equipos/{equipo}/editar', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

// TICKETS NO ESTA LISTA
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/crear', [TicketController::class, 'create']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);

// REPARADORES
Route::get('/reparadores', [ReparadorController::class, 'index'])->name('reparadores.index');
Route::get('/reparadores/crear', [ReparadorController::class, 'create'])->name('reparadores.create');
Route::post('/reparadores', [ReparadorController::class, 'store'])->name('reparadores.store');
Route::get('/reparadores/{reparador}', [ReparadorController::class, 'show'])->name('reparadores.show');
Route::get('/reparadores/{reparador}/editar', [ReparadorController::class, 'edit'])->name('reparadores.edit');
Route::put('/reparadores/{reparador}', [ReparadorController::class, 'update'])->name('reparadores.update');
Route::delete('/reparadores/{reparador}', [ReparadorController::class, 'destroy'])->name('reparadores.destroy');

// MATERIALES
// MATERIALES
Route::get('/materiales', [MaterialesController::class, 'index'])->name('materiales.index');
Route::get('/materiales/crear', [MaterialesController::class, 'create'])->name('materiales.create');
Route::post('/materiales', [MaterialesController::class, 'store'])->name('materiales.store');
Route::get('/materiales/{material}', [MaterialesController::class, 'show'])->name('materiales.show');
Route::get('/materiales/{material}/editar', [MaterialesController::class, 'edit'])->name('materiales.edit');
Route::put('/materiales/{material}', [MaterialesController::class, 'update'])->name('materiales.update');
Route::delete('/materiales/{material}', [MaterialesController::class, 'destroy'])->name('materiales.destroy');

// EVIDENCIAS TICKETS QUE AUN NO QUEDAAA
Route::get('/tickets/create', [EvidenciaController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [EvidenciaController::class, 'store'])->name('tickets.store');
Route::get('/tickets', [EvidenciaController::class, 'index'])->name('tickets.index');

//CONTROLADOR DE API
//Route::prefix('api')->group(function () {
    // no llevan autenticacion
    //Route::get('/location', [ApiController::class, 'getLocation']);
    //Route::get('/weather', [ApiController::class, 'getWeather']);
    //Route::get('/exchange-rate', [ApiController::class, 'getExchangeRate']);
    //Route::get('/all-data', [ApiController::class, 'getAllData']);
    
    // esta es la unica protegidaa
   // Route::get('/weather-with-key', [ApiController::class, 'getWeatherWithKey']);
//});

//Route::get('/', function () {
  //  return view('dashboard');
//});

//Route::get('/dashboard', function () {
   // return view('dashboard');
//}); -->