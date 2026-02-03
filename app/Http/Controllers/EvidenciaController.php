<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Cliente;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
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
        
        $ticket = new Ticket();
        $ticket->cliente_id = $request->cliente_id;
        $ticket->equipo_id = $request->equipo_id;
        $ticket->problema = $request->problema;
        $ticket->diagnostico = $request->diagnostico ?? '';
        $ticket->tipo_reparacion = $request->tipo_reparacion;
        $ticket->prioridad = $request->prioridad;
        $ticket->estado = $request->estado;
        $ticket->metodo_pago = $request->metodo_pago;
        $ticket->total = $request->total;
        $ticket->fecha_ingreso = now();
        $ticket->save();
        
        return redirect('/tickets')->with('exito', 'Ticket creado correctamente');
    }
    
    public function show($id)
    {
        $ticket = Ticket::with(['cliente', 'equipo'])->findOrFail($id);
        return view('tickets.ver', compact('ticket'));
    }
    
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        
        return view('tickets.editar', [
            'ticket' => $ticket,
            'clientes' => $clientes,
            'equipos' => $equipos
        ]);
    }
    
    public function update(Request $request, $id)
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
        
        $ticket = Ticket::findOrFail($id);
        $ticket->cliente_id = $request->cliente_id;
        $ticket->equipo_id = $request->equipo_id;
        $ticket->problema = $request->problema;
        $ticket->diagnostico = $request->diagnostico ?? '';
        $ticket->tipo_reparacion = $request->tipo_reparacion;
        $ticket->prioridad = $request->prioridad;
        $ticket->estado = $request->estado;
        $ticket->metodo_pago = $request->metodo_pago;
        $ticket->total = $request->total;
        
        // Si el estado es "entregado", agregar fecha de salida Nuevoo
        if ($request->estado == 'entregado' && !$ticket->fecha_salida) {
            $ticket->fecha_salida = now();
        }
        
        $ticket->save();
        
        return redirect('/tickets')->with('exito', 'Ticket actualizado correctamente');
    }
    
    // ELIMINAR
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        
        return redirect('/tickets')->with('exito', 'Ticket eliminado correctamente');
    }
}