@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-user-cog mr-2"></i> Detalles del Reparador
            </h1>
            <a href="{{ route('reparadores.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg">
                <i class="fas fa-arrow-left mr-1"></i> Volver
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    @if($reparador->imagen)
                        <img src="{{ asset('storage/' . $reparador->imagen) }}" class="w-full h-auto rounded-lg shadow-md">
                    @else
                        <div class="h-48 flex items-center justify-center bg-gray-200 rounded-lg">
                            <i class="fas fa-user-cog text-6xl text-gray-400"></i>
                        </div>
                    @endif
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">ID</p>
                            <p class="text-base">{{ $reparador->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Estado</p>
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $reparador->estado == 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($reparador->estado) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nombre</p>
                            <p class="text-base">{{ $reparador->nombre }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Apellidos</p>
                            <p class="text-base">{{ $reparador->apellido_paterno }} {{ $reparador->apellido_materno }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Correo</p>
                            <p class="text-base">{{ $reparador->correo }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Celular</p>
                            <p class="text-base">{{ $reparador->celular }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Especialidad</p>
                            <p class="text-base">{{ $reparador->especialidad }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('reparadores.edit', $reparador) }}" class="px-5 py-2.5 bg-yellow-600 text-white rounded-lg">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                    <form action="{{ route('reparadores.destroy', $reparador) }}" method="POST" class="inline"
                          onsubmit="return confirm('¿Eliminar reparador?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-5 py-2.5 bg-red-600 text-white rounded-lg">
                            <i class="fas fa-trash mr-1"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection