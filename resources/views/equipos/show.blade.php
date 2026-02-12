@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-laptop mr-2"></i> Detalles del Equipo
            </h1>
            <a href="{{ route('equipos.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg">
                <i class="fas fa-arrow-left mr-1"></i> Volver
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-images mr-2"></i> Imágenes
                </h2>
                <div class="grid grid-cols-3 gap-4">
                    @forelse($equipo->imagenes as $imagen)
                        <div>
                            <img src="{{ $imagen->imagen_url }}" class="w-full h-32 object-cover rounded-lg border">
                            <p class="text-xs text-center mt-1">Imagen {{ $imagen->orden }}</p>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8 bg-gray-50 rounded-lg">
                            <i class="fas fa-image text-4xl text-gray-400"></i>
                            <p class="text-gray-500 mt-2">Sin imágenes</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">
                        <i class="fas fa-info-circle mr-2"></i> Especificaciones
                    </h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">ID</p>
                            <p class="text-base">{{ $equipo->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Marca</p>
                            <p class="text-base">{{ $equipo->marca }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Modelo</p>
                            <p class="text-base">{{ $equipo->modelo }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Año</p>
                            <p class="text-base">{{ $equipo->ano }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Color</p>
                            <p class="text-base">{{ $equipo->color }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Condición</p>
                            <p class="text-base">{{ ucfirst($equipo->condicion_fisica) }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('equipos.edit', $equipo) }}" class="px-5 py-2.5 bg-yellow-600 text-white rounded-lg">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                    <form action="{{ route('equipos.destroy', $equipo) }}" method="POST"
                          onsubmit="return confirm('¿Eliminar equipo?')">
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