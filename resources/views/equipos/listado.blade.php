@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-laptop mr-2"></i> Listado de Equipos
            </h1>
            <p class="text-gray-600">Gestión de equipos registrados</p>
        </div>
        <a href="/equipos/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Equipo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Modelo</th>
                    <th scope="col" class="px-6 py-3">Marca</th>
                    <th scope="col" class="px-6 py-3">Año</th>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($equipos as $equipo)
    <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-6 py-4 font-medium text-gray-900">
            {{ $equipo->id }}
        </td>
        <td class="px-6 py-4">
            {{ $equipo->modelo }}
        </td>
        <td class="px-6 py-4">
            {{ $equipo->marca }}
        </td>
        <td class="px-6 py-4">
            {{ $equipo->ano }}
        </td>
        <td class="px-6 py-4">
            {{ $equipo->condicion_fisica }}
        </td>
        <td class="px-6 py-4">
            <div class="flex space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-900">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="text-green-600 hover:text-green-900">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:text-red-900">
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
</div>
@endsection