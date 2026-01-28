@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-user-cog mr-2"></i> Listado de Reparadores
            </h1>
            <p class="text-gray-600">Gestión del personal técnico de reparaciones</p>
        </div>
        <a href="/reparadores/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Reparador
        </a>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg">
            <div class="text-blue-600 font-semibold">Total Reparadores</div>
            <div class="text-2xl font-bold">8</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="text-green-600 font-semibold">Activos</div>
            <div class="text-2xl font-bold">6</div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg">
            <div class="text-yellow-600 font-semibold">Disponibles</div>
            <div class="text-2xl font-bold">5</div>
        </div>
        <div class="bg-purple-50 p-4 rounded-lg">
            <div class="text-purple-600 font-semibold">Especialistas</div>
            <div class="text-2xl font-bold">3</div>
        </div>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Reparador</th>
                    <th scope="col" class="px-6 py-3">Contacto</th>
                    <th scope="col" class="px-6 py-3">Especialidad</th>
                    <th scope="col" class="px-6 py-3">Turno</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Reparador 1 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">R001</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Carlos Mendoza López</div>
                                <div class="text-gray-500 text-sm">Experiencia: 5 años</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">carlos.mendoza@email.com</div>
                        <div class="text-gray-500 text-sm">555-111-2233</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Electrónica</span>
                        <div class="text-gray-500 text-sm mt-1">Hardware y Pantallas</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Matutino</span>
                        <div class="text-gray-500 text-sm mt-1">8:00 AM - 4:00 PM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-check-circle mr-1"></i> Activo
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Tickets: 12 activos</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver perfil">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-purple-600 hover:text-purple-900 p-1" title="Asignar tickets">
                                <i class="fas fa-tasks"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Reparador 2 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">R002</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">Ana Torres Ramírez</div>
                                <div class="text-gray-500 text-sm">Experiencia: 3 años</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">ana.torres@email.com</div>
                        <div class="text-gray-500 text-sm">555-222-3344</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Software</span>
                        <div class="text-gray-500 text-sm mt-1">Sistemas Operativos</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Vespertino</span>
                        <div class="text-gray-500 text-sm mt-1">2:00 PM - 10:00 PM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-check-circle mr-1"></i> Activo
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Tickets: 8 activos</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver perfil">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-purple-600 hover:text-purple-900 p-1" title="Asignar tickets">
                                <i class="fas fa-tasks"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Reparador 3 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">R003</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-red-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-gray-900">José Luis Hernández</div>
                                <div class="text-gray-500 text-sm">Experiencia: 7 años</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">jose.hernandez@email.com</div>
                        <div class="text-gray-500 text-sm">555-333-4455</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">General</span>
                        <div class="text-gray-500 text-sm mt-1">Múltiples áreas</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Nocturno</span>
                        <div class="text-gray-500 text-sm mt-1">10:00 PM - 6:00 AM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-times-circle mr-1"></i> Inactivo
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Vacaciones</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver perfil">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
