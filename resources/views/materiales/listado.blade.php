@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-boxes mr-2"></i> Inventario de Materiales
            </h1>
            <p class="text-gray-600">Gestión de materiales y suministros</p>
        </div>
        <a href="{{ route('materiales.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Material
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Imagen</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Categoria</th>
                    <th class="px-6 py-3">Precio</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiales as $material)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $material->id }}</td>
                    <td class="px-6 py-4">
                        @if($material->imagen)
                            <img src="{{ asset('storage/' . $material->imagen) }}" 
                                 alt="{{ $material->nombre }}"
                                 class="h-12 w-12 object-cover rounded-lg border">
                        @else
                            <div class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-box text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $material->nombre }}</td>
                    <td class="px-6 py-4">{{ $material->categoria ?? 'Sin categoria' }}</td>
                    <td class="px-6 py-4">${{ number_format($material->precio_unitario, 2) }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <span class="{{ $material->existencia <= $material->stock_minimo ? 'text-red-600 font-bold' : '' }}">
                                {{ $material->existencia }}
                            </span>
                            @if($material->existencia <= $material->stock_minimo)
                                <span class="ml-2 px-2 py-0.5 text-xs bg-red-100 text-red-800 rounded-full">
                                    Stock bajo
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
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
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-3">
                            <a href="{{ route('materiales.show', $material) }}" 
                               class="text-blue-600 hover:text-blue-900" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('materiales.edit', $material) }}" 
                               class="text-yellow-600 hover:text-yellow-900" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('materiales.destroy', $material) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar este material?')">
                                @csrf @method('DELETE')
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

    @if($materiales->isEmpty())
        <div class="text-center py-10">
            <i class="fas fa-boxes text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">No hay materiales registrados</p>
            <a href="{{ route('materiales.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                Agregar primer material
            </a>
        </div>
    @endif

    <div class="mt-4">{{ $materiales->links() }}</div>
</div>
@endsection