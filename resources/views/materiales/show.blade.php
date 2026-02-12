@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-box mr-2"></i> Detalles del Material
            </h1>
            <a href="{{ route('materiales.index') }}" 
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-1"></i> Volver
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                <div class="bg-gray-50 rounded-lg p-4 text-center">
                    @if($material->imagen)
                        <img src="{{ asset('storage/' . $material->imagen) }}" 
                             alt="{{ $material->nombre }}"
                             class="w-full h-auto rounded-lg shadow-md">
                        <p class="text-xs text-gray-500 mt-2">
                            {{ basename($material->imagen) }}
                        </p>
                    @else
                        <div class="h-48 flex items-center justify-center bg-gray-200 rounded-lg">
                            <i class="fas fa-box text-6xl text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Sin imagen</p>
                    @endif
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">ID</p>
                            <p class="text-base">{{ $material->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Estado</p>
                            @php
                                $estadoColors = [
                                    'disponible' => 'bg-green-100 text-green-800',
                                    'agotado' => 'bg-red-100 text-red-800',
                                    'en_pedido' => 'bg-yellow-100 text-yellow-800',
                                    'descontinuado' => 'bg-gray-100 text-gray-800'
                                ];
                                $color = $estadoColors[$material->estado] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $material->estado)) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Nombre</p>
                            <p class="text-base">{{ $material->nombre }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Categoría</p>
                            <p class="text-base">{{ $material->categoría ?? 'Sin categoría' }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Precio Unitario</p>
                            <p class="text-base text-green-600 font-semibold">${{ number_format($material->precio_unitario, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Existencia</p>
                            <p class="text-base {{ $material->existencia <= $material->stock_minimo ? 'text-red-600 font-bold' : '' }}">
                                {{ $material->existencia }} unidades
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Stock Mínimo</p>
                            <p class="text-base">{{ $material->stock_minimo }} unidades</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Cantidad Inicial</p>
                            <p class="text-base">{{ $material->cantidad_inicial ?? $material->existencia }} unidades</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-gray-500">Descripción</p>
                            <p class="text-base">{{ $material->descripcion ?? 'Sin descripción' }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-gray-500">Ubicación en Almacén</p>
                            <p class="text-base">{{ $material->ubicacion_almacen ?? 'No especificada' }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('materiales.edit', $material) }}" 
                       class="px-5 py-2.5 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                    <form action="{{ route('materiales.destroy', $material) }}" method="POST"
                          onsubmit="return confirm('¿Eliminar este material?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-5 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            <i class="fas fa-trash mr-1"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection