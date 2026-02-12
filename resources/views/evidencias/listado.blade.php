@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-camera mr-2"></i> Evidencias Fotográficas
            </h1>
            <p class="text-gray-600">Registro visual de reparaciones y diagnósticos</p>
        </div>
        <a href="/evidencias/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nueva Evidencia
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ url('/evidencias') }}" class="mb-6 p-4 bg-gray-50 rounded-lg">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Buscar Evidencia</label>
                <input type="text" name="search" placeholder="Buscar por ticket, descripción o fecha..." 
                       class="w-full border border-gray-300 rounded-lg p-2"
                       value="{{ request('search') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ticket Relacionado</label>
                <select name="ticket_id" class="border border-gray-300 rounded-lg p-2">
                    <option value="">Todos los tickets</option>
                    @php
                        $ticketsUnicos = [];
                        if(isset($evidencias) && $evidencias->count() > 0) {
                            foreach($evidencias as $evidencia) {
                                if($evidencia->ticket_id && !in_array($evidencia->ticket_id, $ticketsUnicos)) {
                                    $ticketsUnicos[] = $evidencia->ticket_id;
                                }
                            }
                        }
                    @endphp
                    
                    @if(count($ticketsUnicos) > 0)
                        @foreach($ticketsUnicos as $ticketId)
                            <option value="{{ $ticketId }}" {{ request('ticket_id') == $ticketId ? 'selected' : '' }}>
                                Ticket #{{ $ticketId }}
                            </option>
                        @endforeach
                    @else
                        <option value="1">Ticket #1</option>
                        <option value="2">Ticket #2</option>
                        <option value="3">Ticket #3</option>
                    @endif
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-filter mr-2"></i> Filtrar
                </button>
                @if(request()->hasAny(['search', 'ticket_id']))
                    <a href="{{ url('/evidencias') }}" class="ml-2 text-gray-600 hover:text-gray-800 px-4 py-2">
                        <i class="fas fa-times mr-1"></i> Limpiar
                    </a>
                @endif
            </div>
        </div>
    </form>

    @if(isset($evidencias) && $evidencias->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($evidencias as $evidencia)
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    <!-- Imagen -->
                    <div class="bg-gray-100 h-48 flex items-center justify-center overflow-hidden">
                        @if($evidencia->imagen && \Illuminate\Support\Facades\Storage::disk('public')->exists($evidencia->imagen))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($evidencia->imagen) }}" 
                                 alt="{{ $evidencia->descripcion }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="text-center">
                                <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                                <p class="text-gray-500">
                                    @if(strlen($evidencia->descripcion) > 30)
                                        {{ substr($evidencia->descripcion, 0, 30) }}...
                                    @else
                                        {{ $evidencia->descripcion }}
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    EVD-{{ str_pad($evidencia->id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded ml-2">
                                    T{{ str_pad($evidencia->ticket_id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                            <span class="text-xs text-gray-500">
                                @if($evidencia->fecha)
                                    {{ \Carbon\Carbon::parse($evidencia->fecha)->format('Y-m-d') }}
                                @else
                                    {{ \Carbon\Carbon::parse($evidencia->created_at)->format('Y-m-d') }}
                                @endif
                            </span>
                        </div>
                        
                        <h3 class="font-medium text-gray-900 mb-2">
                            @if(strlen($evidencia->descripcion) > 50)
                                {{ substr($evidencia->descripcion, 0, 50) }}...
                            @else
                                {{ $evidencia->descripcion }}
                            @endif
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3">
                            @if(isset($evidencia->ticket_problema))
                                {{ substr($evidencia->ticket_problema, 0, 100) }}...
                            @else
                                Ticket #{{ $evidencia->ticket_id }}
                            @endif
                        </p>
                        
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-user mr-1"></i>
                                {{ $evidencia->tecnico_nombre ?? 'Sin técnico asignado' }}
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ url('/evidencias/' . $evidencia->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 text-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                
                                <!-- eliminar -->
                                <form action="{{ url('/evidencias/' . $evidencia->id) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('¿Estás seguro de eliminar esta evidencia?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if(method_exists($evidencias, 'links'))
            <div class="mt-6">
                {{ $evidencias->links() }}
            </div>
        @endif
    @else
        <div class="text-center py-12">
            <i class="fas fa-camera text-5xl text-gray-300 mb-3"></i>
            <h3 class="text-lg font-medium text-gray-700 mb-2">No hay evidencias registradas</h3>
            <p class="text-gray-500 mb-4">Comienza subiendo tu primera evidencia fotográfica.</p>
            <a href="/evidencias/crear" 
               class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-plus mr-2"></i> Subir Primera Evidencia
            </a>
        </div>
    @endif

    <div class="mt-8 p-4 bg-blue-50 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-info-circle text-blue-600 text-xl mr-3"></i>
            <div>
                <h3 class="font-semibold text-blue-800">Importancia de las Evidencias</h3>
                <p class="text-blue-700 text-sm">
                    Las evidencias fotográficas son cruciales para: documentar el estado inicial del equipo, 
                    justificar reparaciones necesarias, mostrar avances al cliente y mantener un historial visual.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection