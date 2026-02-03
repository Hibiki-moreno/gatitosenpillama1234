<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Equipo;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['cliente', 'equipo'])
            ->orderBy('id', 'desc')
            ->get();
            
        return view('tickets.listado', ['tickets' => $tickets]);
    }
    
    public function create()
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        return view('tickets.formulario', [
            'clientes' => $clientes,
            'equipos' => $equipos
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'equipo_id' => 'required',
            'problema' => 'required',
            'prioridad' => 'required',
            'estado' => 'required',
            'tipo_reparacion' => 'required',
            'metodo_pago' => 'required',
            'total' => 'required|numeric'
        ]);
        
        Ticket::create([
            'cliente_id' => $request->cliente_id,
            'equipo_id' => $request->equipo_id,
            'problema' => $request->problema,
            'diagnostico' => $request->diagnostico ?? '',
            'tipo_reparacion' => $request->tipo_reparacion,
            'prioridad' => $request->prioridad,
            'estado' => $request->estado,
            'metodo_pago' => $request->metodo_pago,
            'total' => $request->total,
            'fecha_ingreso' => now()
        ]);
        
        return redirect('/tickets')->with('exito', 'Ticket creado correctamente');
    }
    
    // Eliminar un ticket
    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect('/tickets')->with('exito', 'Ticket eliminado');
    }
}