@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-user mr-2"></i> Detalles del Cliente
            </h1>
            <a href="{{ route('clientes.index') }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Volver
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Columna de imagen --}}
            <div class="md:col-span-1">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    @if($cliente->imagen)
                        <img src="{{ asset('storage/' . $cliente->imagen) }}" 
                             alt="Foto del cliente"
                             class="w-full h-auto rounded-lg shadow-md">
                        <p class="text-xs text-gray-500 mt-2">
                            {{ basename($cliente->imagen) }}
                        </p>
                    @else
                        <div class="h-48 flex items-center justify-center bg-gray-200 rounded-lg">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Sin foto registrada</p>
                    @endif
                </div>
            </div>

            {{-- Columna de datos --}}
            <div class="md:col-span-2">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">
                        <i class="fas fa-id-card mr-2"></i> Información Personal
                    </h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">ID</p>
                            <p class="text-base text-gray-900">{{ $cliente->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Estado</p>
                            @php
                                $estadoColors = [
                                    'activo' => 'bg-green-100 text-green-800',
                                    'inactivo' => 'bg-red-100 text-red-800',
                                    'pendiente' => 'bg-yellow-100 text-yellow-800'
                                ];
                                $color = $estadoColors[$cliente->estado] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $color }}">
                                {{ ucfirst($cliente->estado) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nombres</p>
                            <p class="text-base text-gray-900">{{ $cliente->nombres }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Apellido Paterno</p>
                            <p class="text-base text-gray-900">{{ $cliente->apellido_paterno }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Apellido Materno</p>
                            <p class="text-base text-gray-900">{{ $cliente->apellido_materno ?? 'No registrado' }}</p>
                        </div>
                    </div>

                    <h2 class="text-lg font-semibold text-gray-700 mb-4 mt-6 border-b pb-2">
                        <i class="fas fa-address-book mr-2"></i> Información de Contacto
                    </h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Correo Electrónico</p>
                            <p class="text-base text-gray-900">{{ $cliente->correo }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Celular</p>
                            <p class="text-base text-gray-900">{{ $cliente->celular }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-gray-500">Dirección</p>
                            <p class="text-base text-gray-900">{{ $cliente->direccion }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('clientes.edit', $cliente) }}" 
                       class="px-5 py-2.5 text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                    <form action="{{ route('clientes.destroy', $cliente) }}" 
                          method="POST" 
                          onsubmit="return confirm('¿Eliminar este cliente?')"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-5 py-2.5 text-white bg-red-600 rounded-lg hover:bg-red-700">
                            <i class="fas fa-trash mr-1"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection