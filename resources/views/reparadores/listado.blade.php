@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-tools mr-2"></i> Listado de Reparadores
            </h1>
            <p class="text-gray-600">Gestión de técnicos reparadores</p>
        </div>
        <a href="{{ route('reparadores.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Reparador
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
                    <th class="px-6 py-3">Foto</th>
                    <th class="px-6 py-3">Nombres</th>
                    <th class="px-6 py-3">Apellidos</th>
                    <th class="px-6 py-3">Contacto</th>
                    <th class="px-6 py-3">Especialidad</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparadores as $reparador)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $reparador->id }}</td>
                    <td class="px-6 py-4">
                        @if($reparador->imagen)
                            <img src="{{ asset('storage/' . $reparador->imagen) }}" 
                                 alt="Foto del reparador"
                                 class="h-12 w-12 rounded-full object-cover border-2 border-gray-200">
                        @else
                            <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user-cog text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $reparador->nombres }}</td> <!-- ✅ CORREGIDO -->
                    <td class="px-6 py-4">{{ $reparador->apellido_paterno }} {{ $reparador->apellido_materno }}</td>
                    <td class="px-6 py-4">
                        <div>{{ $reparador->correo }}</div>
                        <div class="text-xs text-gray-500">{{ $reparador->celular }}</div>
                    </td>
                    <td class="px-6 py-4">
                        {{ $reparador->especialidad->nombre ?? 'Sin especialidad' }} <!-- ✅ CORREGIDO -->
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $color = $reparador->estado == 'activo' ? 'bg-green-100 text-green-800' : 
                                    ($reparador->estado == 'inactivo' ? 'bg-red-100 text-red-800' : 
                                    'bg-yellow-100 text-yellow-800');
                        @endphp
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $color }}">
                            {{ ucfirst($reparador->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-3">
                            <a href="{{ route('reparadores.show', $reparador) }}" 
                               class="text-blue-600 hover:text-blue-900" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('reparadores.edit', $reparador) }}" 
                               class="text-yellow-600 hover:text-yellow-900" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('reparadores.destroy', $reparador) }}" method="POST"
                                  onsubmit="return confirm('¿Está seguro de eliminar este reparador?')">
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

    @if($reparadores->isEmpty())
        <div class="text-center py-10">
            <i class="fas fa-tools text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">No hay reparadores registrados</p>
            <a href="{{ route('reparadores.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                Crear primer reparador
            </a>
        </div>
    @endif

    <div class="mt-4">
        {{ $reparadores->links() }}
    </div>
</div>
@endsection