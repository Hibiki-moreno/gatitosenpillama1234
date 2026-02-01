@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-boxes mr-2"></i> Materiales
            </h1>
            <p class="text-gray-600">Lista de materiales en inventario</p>
        </div>
        <a href="/materiales/crear" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Material
        </a>
    </div>

    <!-- Tabla de materiales -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Categoría</th>
                    <th class="px-6 py-3">Precio Unitario</th>
                    <th class="px-6 py-3">Existencia</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiales as $material)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $material->id }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $material->nombre }}</div>
                        <div class="text-gray-500 text-xs">{{ Str::limit($material->descripcion, 50) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ ucfirst($material->categoria) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">${{ number_format($material->precio_unitario, 2) }}</td>
                    <td class="px-6 py-4">
                        <span class="font-medium {{ $material->existencia <= $material->stock_minimo ? 'text-red-600' : 'text-green-600' }}">
                            {{ $material->existencia }}
                        </span>
                        @if($material->stock_minimo)
                            <div class="text-xs text-gray-500">Mín: {{ $material->stock_minimo }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $estadoColors = [
                                'disponible' => 'bg-green-100 text-green-800',
                                'agotado' => 'bg-red-100 text-red-800',
                                'reservado' => 'bg-yellow-100 text-yellow-800',
                                'descontinuado' => 'bg-gray-100 text-gray-800'
                            ];
                        @endphp
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded {{ $estadoColors[$material->estado] ?? 'bg-gray-100' }}">
                            {{ ucfirst($material->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <!-- Editar -->
                            <a href="/materiales/{{ $material->id }}/editar" 
                               class="text-yellow-600 hover:text-yellow-900"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <!-- Eliminar -->
                            <form action="/materiales/{{ $material->id }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('¿Eliminar este material?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($materiales->count() == 0)
    <div class="text-center py-12">
        <i class="fas fa-box-open text-4xl text-gray-300 mb-3"></i>
        <p class="text-lg text-gray-700 mb-2">No hay materiales registrados</p>
        <p class="text-gray-500 mb-4">Comienza agregando tu primer material</p>
        <a href="/materiales/crear" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-plus mr-1"></i> Crear primer material
        </a>
    </div>
    @endif
</div>
@endsection