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
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse($tickets as $ticket)
                <tr class="border-b hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $ticket->id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $ticket->problema }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $ticket->cliente->nombre ?? 'Sin cliente' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $ticket->fecha_ingreso }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $ticket->estado }}
                    </td>

                    <td class="px-6 py-4">
                        ${{ $ticket->total }}
                    </td>

                    <!-- ACCIONES -->
                    <td class="px-6 py-4">
                        <div class="flex gap-2 justify-center">

                            {{-- VER --}}
                            <a href="{{ route('tickets.show', $ticket->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                <i class="fas fa-eye"></i>
                            </a>

                            {{-- EVIDENCIAS --}}
                          <a href="{{ route('tickets.evidencia', $ticket->id) }}"
                            class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded text-xs">
                                <i class="fas fa-images"></i> Agregar
                            </a>


                            {{-- EDITAR --}}
                            <a href="{{ route('tickets.edit', $ticket->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">
                                <i class="fas fa-pen"></i>
                            </a>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('tickets.destroy', $ticket->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar este ticket?');">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-500">
                        No hay tickets registrados
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>
</div>
@endsection
