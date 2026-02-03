@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Equipos</h1>
        <a href="/equipos/crear" class="bg-green-600 text-white px-4 py-2 rounded">
            Nuevo Equipo
        </a>
    </div>

    <table class="w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Año</th>
                <th>Condición</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($equipos as $equipo)
            <tr>
                <td>{{ $equipo->id }}</td>
                <td>{{ $equipo->modelo }}</td>
                <td>{{ $equipo->marca }}</td>
                <td>{{ $equipo->ano }}</td>
                <td>{{ $equipo->condicion_fisica }}</td>
                <td>{{ $equipo->color }}</td>
                <td class="flex space-x-2">
                    <a href="/equipos/{{ $equipo->id }}/editar" class="text-green-600">✏️</a>

                    <form action="/equipos/{{ $equipo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600"
                                onclick="return confirm('¿Eliminar equipo?')">
                            🗑
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
