@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-users mr-2"></i> Listado de Clientes
            </h1>
            <p class="text-gray-600">Gestión de clientes registrados en el sistema</p>
        </div>
        <a href="{{ route('clientes.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center transition">
            <i class="fas fa-plus mr-2"></i> Nuevo Cliente
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
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Foto</th> {{-- ✅ NUEVA COLUMNA --}}
                    <th scope="col" class="px-6 py-3">Nombres</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Celular</th>
                    <th scope="col" class="px-6 py-3">Correo</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $cliente->id }}</td>
                    
                    {{-- ✅ COLUMNA DE IMAGEN --}}
                    <td class="px-6 py-4">
                        @if($cliente->imagen)
                            <img src="{{ asset('storage/' . $cliente->imagen) }}" 
                                 alt="Foto de {{ $cliente->nombres }}"
                                 class="h-12 w-12 rounded-full object-cover border-2 border-gray-200">
                        @else
                            <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    
                    <td class="px-6 py-4">{{ $cliente->nombres }}</td>
                    <td class="px-6 py-4">{{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</td>
                    <td class="px-6 py-4">{{ $cliente->celular }}</td>
                    <td class="px-6 py-4">{{ $cliente->correo }}</td>
                    
                    {{-- ✅ ESTADO CON COLORES --}}
                    <td class="px-6 py-4">
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
                    </td>
                    
                    {{-- ✅ ACCIONES CON ROUTES --}}
                    <td class="px-6 py-4">
                        <div class="flex space-x-3">
                            {{-- VER --}}
                            <a href="{{ route('clientes.show', $cliente) }}"
                               class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            {{-- EDITAR --}}
                            <a href="{{ route('clientes.edit', $cliente) }}"
                               class="text-yellow-600 hover:text-yellow-900">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- ELIMINAR --}}
                            <form action="{{ route('clientes.destroy', $cliente) }}" 
                                  method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                @csrf
                                @method('DELETE')
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

    @if ($clientes->isEmpty())
        <div class="text-center py-10">
            <i class="fas fa-users text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">No hay clientes registrados</p>
            <a href="{{ route('clientes.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                Crear primer cliente
            </a>
        </div>
    @endif

    {{-- ✅ PAGINACIÓN --}}
    <div class="mt-4">
        {{ $clientes->links() }}
    </div>
</div>
@endsection