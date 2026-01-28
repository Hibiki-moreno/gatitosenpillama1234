cat > resources/views/tickets/listado.blade.php << 'EOF'
@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-ticket-alt mr-2"></i> Listado de Tickets
            </h1>
            <p class="text-gray-600">Gestión de tickets de reparación</p>
        </div>
        <a href="/tickets/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Ticket
        </a>
    </div>

    <!-- Filtros -->
    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Buscar</label>
                <input type="text" placeholder="Buscar por ID, problema o cliente..." 
                       class="w-full border border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select class="border border-gray-300 rounded-lg p-2">
                    <option value="">Todos</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="proceso">En Proceso</option>
                    <option value="completado">Completado</option>
                    <option value="cancelado">Cancelado</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-filter mr-2"></i> Filtrar
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Problema</th>
                    <th scope="col" class="px-6 py-3">Cliente</th>
                    <th scope="col" class="px-6 py-3">Equipo</th>
                    <th scope="col" class="px-6 py-3">Fecha Ingreso</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ticket 1 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">T001</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">Pantalla no enciende</div>
                        <div class="text-gray-500 text-sm">Diagnóstico: Pantalla LCD dañada</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">Juan Pérez López</div>
                        <div class="text-gray-500 text-sm">555-123-4567</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">Dell Inspiron 15</div>
                        <div class="text-gray-500 text-sm">Laptop • 2023</div>
                    </td>
                    <td class="px-6 py-4">
                        <div>2024-01-15</div>
                        <div class="text-gray-500 text-sm">10:30 AM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-clock mr-1"></i> En Proceso
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Prioridad: <span class="font-medium text-red-600">Alta</span></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-purple-600 hover:text-purple-900 p-1" title="Asignar reparador">
                                <i class="fas fa-user-cog"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 p-1" title="Cancelar">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Ticket 2 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">T002</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">Teclado dañado</div>
                        <div class="text-gray-500 text-sm">Diagnóstico: Teclas faltantes</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">María García Rodríguez</div>
                        <div class="text-gray-500 text-sm">555-987-6543</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">HP Pavilion</div>
                        <div class="text-gray-500 text-sm">Laptop • 2022</div>
                    </td>
                    <td class="px-6 py-4">
                        <div>2024-01-10</div>
                        <div class="text-gray-500 text-sm">02:15 PM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-check mr-1"></i> Completado
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Total: <span class="font-medium">$850.00</span></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900 p-1" title="Ver evidencia">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Ticket 3 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">T003</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">No carga la batería</div>
                        <div class="text-gray-500 text-sm">Diagnóstico: Conector de carga dañado</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">Roberto Sánchez</div>
                        <div class="text-gray-500 text-sm">555-456-7890</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">Lenovo ThinkPad</div>
                        <div class="text-gray-500 text-sm">Laptop • 2021</div>
                    </td>
                    <td class="px-6 py-4">
                        <div>2024-01-18</div>
                        <div class="text-gray-500 text-sm">09:00 AM</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-hourglass-start mr-1"></i> Pendiente
                        </span>
                        <div class="text-gray-500 text-sm mt-1">Prioridad: <span class="font-medium text-yellow-600">Media</span></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-purple-600 hover:text-purple-900 p-1" title="Asignar reparador">
                                <i class="fas fa-user-cog"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Resumen -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-blue-50 p-4 rounded-lg">
            <div class="text-blue-600 font-semibold">Total Tickets</div>
            <div class="text-2xl font-bold">15</div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg">
            <div class="text-yellow-600 font-semibold">En Proceso</div>
            <div class="text-2xl font-bold">5</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="text-green-600 font-semibold">Completados</div>
            <div class="text-2xl font-bold">8</div>
        </div>
        <div class="bg-red-50 p-4 rounded-lg">
            <div class="text-red-600 font-semibold">Pendientes</div>
            <div class="text-2xl font-bold">2</div>
        </div>
    </div>

    <!-- Mensaje si no hay tickets -->
    <div class="text-center py-12 text-gray-500 hidden">
        <i class="fas fa-ticket-alt text-5xl mb-4"></i>
        <p class="text-xl mb-2">No hay tickets registrados</p>
        <p class="mb-4">Comience creando su primer ticket de reparación</p>
        <a href="/tickets/crear" class="bg-blue-600 text-white px-6 py-3 rounded-lg inline-block hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i> Crear Primer Ticket
        </a>
    </div>
</div>
@endsection
EOF