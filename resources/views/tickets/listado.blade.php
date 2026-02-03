@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-ticket-alt mr-2"></i> Listado de Tickets
            </h1>
            <p class="text-gray-600">Gestión de tickets</p>
        </div>
        <a href="/tickets/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i> Nuevo Ticket
        </a>
    </div>
    
    @if(session('exito'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('exito') }}
        </div>
    @endif
    
    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Problema</th>
                    <th class="px-6 py-3">Cliente</th>
                    <th class="px-6 py-3">Fecha</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        T{{ str_pad($ticket->id, 3, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $ticket->problema }}</div>
                        @if($ticket->diagnostico)
                            <div class="text-gray-500 text-sm">{{ Str::limit($ticket->diagnostico, 30) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($ticket->cliente)
                            {{ $ticket->cliente->nombre }}
                        @else
                            <span class="text-gray-500">Cliente no encontrado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y', strtotime($ticket->fecha_ingreso)) }}
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $estadoColors = [
                                'pendiente' => 'bg-gray-100 text-gray-800',
                                'diagnostico' => 'bg-blue-100 text-blue-800',
                                'espera' => 'bg-yellow-100 text-yellow-800'
                            ];
                        @endphp
                        <span class="{{ $estadoColors[$ticket->estado] ?? 'bg-gray-100' }} text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ ucfirst($ticket->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        ${{ number_format($ticket->total, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <form action="/tickets/{{ $ticket->id }}" method="POST" 
                              onsubmit="return confirm('¿Eliminar este ticket?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                        No hay tickets registrados
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection