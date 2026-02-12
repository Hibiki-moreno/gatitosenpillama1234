<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Equipo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('cliente')
            ->withCount('evidencias')
            ->orderBy('id', 'desc')
            ->get();

        return view('tickets.listado', compact('tickets'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        return view('tickets.formulario', compact('clientes', 'equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id'      => 'required',
            'problema'        => 'required',
            'prioridad'       => 'required',
            'estado'          => 'required',
            'tipo_reparacion' => 'required',
            'metodo_pago'     => 'required',
            'total'           => 'required|numeric'
        ]);

        Ticket::create([
            'cliente_id'      => $request->cliente_id,
            'problema'        => $request->problema,
            'diagnostico'     => $request->diagnostico ?? '',
            'tipo_reparacion' => $request->tipo_reparacion,
            'prioridad'       => $request->prioridad,
            'estado'          => $request->estado,
            'metodo_pago'     => $request->metodo_pago,
            'total'           => $request->total,
            'fecha_ingreso'   => now()
        ]);

        return redirect('/tickets')->with('exito', 'Ticket creado correctamente');
    }

    /**
     * Muestra el formulario para agregar evidencia a un ticket específico
     */
    public function crearEvidencia(Ticket $ticket)
    {
        // Cargamos todos los tickets porque tu vista 'evidencias.formulario' 
        // tiene un @foreach($tickets as $t) en el select.
        $tickets = Ticket::all();

        // Cargamos relaciones del ticket actual por si las necesitas mostrar
        $ticket->load('evidencias', 'materials');

        return view('evidencias.formulario', compact('ticket', 'tickets'));
    }

    /**
     * Guarda la evidencia en la base de datos
     */
    public function guardarEvidencia(Request $request, Ticket $ticket)
    {
        $request->validate([
            'imagen'      => 'required|image|max:2048',
            'descripcion' => 'nullable|string|max:255',
        ]);

        // Guardar físicamente el archivo
        $ruta = $request->file('imagen')->store('evidencias', 'public');

        // Crear el registro usando la relación del modelo
        $ticket->evidencias()->create([
            'imagen'      => $ruta,
            'descripcion' => $request->descripcion,
            'fecha'       => now(),
            'tecnico_id'  => auth()->id() ?? 1, 
        ]);

        // Redireccionamos (Asegúrate que la ruta 'tickets.index' existe o cámbiala a '/tickets')
        return redirect('/tickets')->with('exito', 'Evidencia agregada correctamente');
    }

    public function showEvidance($id)
    {
        $ticket = Ticket::with('evidencias', 'materials')->findOrFail($id);
        return view('tickets.showEvidance', compact('ticket'));
    }

    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect('/tickets')->with('exito', 'Ticket eliminado');
    }
}