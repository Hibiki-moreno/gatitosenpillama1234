@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-camera mr-2"></i> Evidencias Fotográficas
            </h1>
            <p class="text-gray-600">Registro visual de reparaciones y diagnósticos</p>
        </div>
        <a href="/evidencias/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nueva Evidencia
        </a>
    </div>

    <!-- Filtros -->
    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Buscar Evidencia</label>
                <input type="text" placeholder="Buscar por ticket, descripción o fecha..." 
                       class="w-full border border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ticket Relacionado</label>
                <select class="border border-gray-300 rounded-lg p-2">
                    <option value="">Todos los tickets</option>
                    <option value="T001">T001 - Pantalla no enciende</option>
                    <option value="T002">T002 - Teclado dañado</option>
                    <option value="T003">T003 - No carga la batería</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-filter mr-2"></i> Filtrar
                </button>
            </div>
        </div>
    </div>

    <!-- Galería de Evidencias -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Evidencia 1 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
            <div class="bg-gray-100 h-48 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Pantalla LCD dañada</p>
                </div>
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">EVD-001</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded ml-2">T001</span>
                    </div>
                    <span class="text-xs text-gray-500">2024-01-15</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Pantalla rota - Dell Inspiron</h3>
                <p class="text-gray-600 text-sm mb-3">Fisura en esquina inferior derecha, pantalla con líneas verticales</p>
                <div class="flex justify-between items-center">
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-user mr-1"></i> Carlos Mendoza
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 text-sm">
                            <i class="fas fa-eye"></i> Ver
                        </button>
                        <button class="text-red-600 hover:text-red-900 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evidencia 2 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
            <div class="bg-gray-100 h-48 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Teclado dañado</p>
                </div>
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">EVD-002</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded ml-2">T002</span>
                    </div>
                    <span class="text-xs text-gray-500">2024-01-16</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Teclas faltantes - HP Pavilion</h3>
                <p class="text-gray-600 text-sm mb-3">Teclas A, S, D, F y Enter faltantes, base del teclado expuesta</p>
                <div class="flex justify-between items-center">
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-user mr-1"></i> Ana Torres
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 text-sm">
                            <i class="fas fa-eye"></i> Ver
                        </button>
                        <button class="text-red-600 hover:text-red-900 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evidencia 3 -->
        <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
            <div class="bg-gray-100 h-48 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Conector de carga</p>
                </div>
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">EVD-003</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded ml-2">T003</span>
                    </div>
                    <span class="text-xs text-gray-500">2024-01-18</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-2">Conector dañado - Lenovo ThinkPad</h3>
                <p class="text-gray-600 text-sm mb-3">Conector de carga suelto, soldadura desprendida, oxidación visible</p>
                <div class="flex justify-between items-center">
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-user mr-1"></i> José Luis Hernández
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 text-sm">
                            <i class="fas fa-eye"></i> Ver
                        </button>
                        <button class="text-red-600 hover:text-red-900 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Alternativa (para vista de lista) -->
    <div class="mt-8 overflow-x-auto hidden">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Ticket</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Fecha</th>
                    <th scope="col" class="px-6 py-3">Imagen</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">EVD-001</td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">T001</span>
                        <div class="text-gray-500 text-sm mt-1">Pantalla no enciende</div>
                    </td>
                    <td class="px-6 py-4">Fisura en pantalla LCD, líneas verticales visibles</td>
                    <td class="px-6 py-4">2024-01-15</td>
                    <td class="px-6 py-4">
                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></button>
                            <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Información Adicional -->
    <div class="mt-8 p-4 bg-blue-50 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-info-circle text-blue-600 text-xl mr-3"></i>
            <div>
                <h3 class="font-semibold text-blue-800">Importancia de las Evidencias</h3>
                <p class="text-blue-700 text-sm">
                    Las evidencias fotográficas son cruciales para: documentar el estado inicial del equipo, 
                    justificar reparaciones necesarias, mostrar avances al cliente y mantener un historial visual.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
