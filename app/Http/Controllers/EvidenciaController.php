<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Models\Ticket;
use App\Models\Reparador; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    // app/Http/Controllers/EvidenciaController.php

public function index()
{
    // En lugar de Evidence::all(), traemos los tickets con sus fotos
    $tickets = \App\Models\Ticket::with('evidencias')->get();

    // Enviamos 'tickets' a la vista para que el @foreach($tickets...) funcione
    return view('evidencias.listado', compact('tickets'));
}
    public function create($ticketId = null)
    {
        $tickets = Ticket::all();
        $tecnicos = Reparador::all(); 
        $ticket = $ticketId ? Ticket::find($ticketId) : null;

        return view('evidencias.formulario', compact('tickets', 'tecnicos', 'ticket', 'ticketId'));
    }

    public function store(Request $request)
    {
        // 1. VALIDACIÓN: Si esto falla, ni siquiera intenta insertar en la DB
        $request->validate([
            'ticket_id'    => 'required|exists:tickets,id',
            'imagen'       => 'required|image|max:5120', // El nombre del input en tu HTML es 'imagen'
            'descripcion'  => 'nullable|string|max:400',
            'fecha'        => 'nullable|date',
            'tecnico_id'   => 'nullable|exists:reparadores,id' 
        ]);

        // 2. GUARDAR ARCHIVO
        $path = $request->file('imagen')->store('evidencias', 'public');

        // 3. INSERTAR EN DB
        // Asegúrate de que los nombres de la izquierda coincidan con tu SQL
        Evidencia::create([
            'ticket_id'    => $request->ticket_id,
            'ruta'         => $path,           // <--- Esto es lo que MySQL pedía
            'descripcion'  => $request->descripcion,
            'fecha'        => $request->fecha ?? now(),
            'reparador_id' => $request->tecnico_id
        ]);

        return back()->with('exito', 'Evidencia guardada al mero madrazo');
    }

    public function destroy($id)
    {
        $evidencia = Evidencia::findOrFail($id);

        if ($evidencia->ruta) {
            Storage::disk('public')->delete($evidencia->ruta);
        }

        $evidencia->delete();

        return back()->with('exito', 'Evidencia eliminada correctamente');
    }
}