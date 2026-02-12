@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-laptop mr-2"></i> Inventario de Equipos
            </h1>
            <p class="text-gray-600">Gestión de equipos tecnológicos</p>
        </div>
        <a href="{{ route('equipos.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Equipo
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
                    <th class="px-6 py-3">Equipo</th>
                    <th class="px-6 py-3">Año</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3">Condición</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipos as $equipo)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $equipo->id }}</td>
                    <td class="px-6 py-4">
                        @if($equipo->imagenes->isNotEmpty())
                            <img src="{{ $equipo->imagenes->first()->imagen_url }}" 
                                 alt="Equipo"
                                 class="h-12 w-12 object-cover rounded-lg border">
                        @else
                            <div class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-laptop text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">{{ $equipo->marca }} {{ $equipo->modelo }}</div>
                    </td>
                    <td class="px-6 py-4">{{ $equipo->ano }}</td>
                    <td class="px-6 py-4">{{ $equipo->color }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                            {{ $equipo->condicion_fisica == 'excelente' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $equipo->condicion_fisica == 'bueno' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $equipo->condicion_fisica == 'regular' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $equipo->condicion_fisica == 'malo' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($equipo->condicion_fisica) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-3">
                            <a href="{{ route('equipos.show', $equipo) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('equipos.edit', $equipo) }}" class="text-yellow-600 hover:text-yellow-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('equipos.destroy', $equipo) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar equipo?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
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

    @if($equipos->isEmpty())
        <div class="text-center py-10">
            <i class="fas fa-laptop text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500">No hay equipos registrados</p>
        </div>
    @endif

    <div class="mt-4">{{ $equipos->links() }}</div>
</div>
@endsection