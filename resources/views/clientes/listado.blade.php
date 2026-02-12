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
        <a href="/clientes/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center transition">
            <i class="fas fa-plus mr-2"></i> Nuevo Cliente
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nombres</th>
                    <th scope="col" class="px-6 py-3">Apellidos</th>
                    <th scope="col" class="px-6 py-3">Celular</th>
                    <th scope="col" class="px-6 py-3">Correo</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            @foreach ($clientes as $cliente)
<tr>
    <td>{{ $cliente->id }}</td>
    <td>{{ $cliente->nombres }}</td>
    <td>{{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</td>
    <td>{{ $cliente->cellular}}</td>
    <td>{{ $cliente->correo }}</td>
    <td>{{ $cliente->estado }}</td>
    <td>
        <td class="px-6 py-4">
    <div class="flex space-x-4">
        <!-- EDITAR -->
        <a href="/clientes/{{ $cliente->id }}/editar"
           class="text-blue-600 hover:text-blue-900">
            Editar
        </a>

        <!-- ELIMINAR -->
        <form action="{{ url('/clientes/'.$cliente->id) }}" method="POST"
              onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900">
                Eliminar
            </button>
        </form>
    </div>
</td>


    </td>
</tr>
@endforeach

        </table>
    </div>

    <div></div>
    @if ($clientes->isEmpty())
<tr>
    <td colspan="8" class="text-center py-6 text-gray-500">
        No hay clientes registrados
    </td>   
</tr>
@endif
</div>
</div>
@endsection