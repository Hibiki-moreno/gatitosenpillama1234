@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
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

    <!-- Tabla Flowbite -->
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
            <tbody>
                <!-- Ejemplo de datos -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">001</td>
                    <td class="px-6 py-4">Juan Carlos</td>
                    <td class="px-6 py-4">Pérez López</td>
                    <td class="px-6 py-4">555-123-4567</td>
                    <td class="px-6 py-4">juan@email.com</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Activo</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Segundo ejemplo -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">002</td>
                    <td class="px-6 py-4">María Elena</td>
                    <td class="px-6 py-4">González Rodríguez</td>
                    <td class="px-6 py-4">555-987-6543</td>
                    <td class="px-6 py-4">maria@email.com</td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pendiente</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Mensaje si no hay datos -->
    <div class="text-center py-8 text-gray-500">
        <i class="fas fa-users text-4xl mb-4"></i>
        <p class="text-lg">No hay clientes registrados</p>
        <a href="/clientes/crear" class="text-blue-600 hover:underline mt-2 inline-block">
            <i class="fas fa-plus mr-1"></i> Agregar primer cliente
        </a>
    </div>
</div>
@endsection