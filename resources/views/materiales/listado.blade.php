@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-boxes mr-2"></i> Inventario de Materiales
            </h1>
            <p class="text-gray-600">Gestión de materiales y repuestos</p>
        </div>
        <a href="/materiales/crear" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Material
        </a>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg">
            <div class="text-blue-600 font-semibold">Total Materiales</div>
            <div class="text-2xl font-bold">42</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="text-green-600 font-semibold">Disponibles</div>
            <div class="text-2xl font-bold">35</div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-lg">
            <div class="text-yellow-600 font-semibold">Stock Bajo</div>
            <div class="text-2xl font-bold">5</div>
        </div>
        <div class="bg-red-50 p-4 rounded-lg">
            <div class="text-red-600 font-semibold">Agotados</div>
            <div class="text-2xl font-bold">2</div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Buscar Material</label>
                <input type="text" placeholder="Buscar por nombre, código o descripción..." 
                       class="w-full border border-gray-300 rounded-lg p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                <select class="border border-gray-300 rounded-lg p-2">
                    <option value="">Todas</option>
                    <option value="pantallas">Pantallas</option>
                    <option value="teclados">Teclados</option>
                    <option value="baterias">Baterías</option>
                    <option value="cargadores">Cargadores</option>
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
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Material</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Precio</th>
                    <th scope="col" class="px-6 py-3">Existencia</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Material 1 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">MAT-001</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">Pantalla LCD 15.6"</div>
                        <div class="text-gray-500 text-sm">Para Dell Inspiron</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-900">Pantalla LCD Full HD 1920x1080</div>
                        <div class="text-gray-500 text-sm">Compatible con varios modelos</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">$1,250.00</div>
                        <div class="text-gray-500 text-sm">MXN</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">8 unidades</div>
                        <div class="text-gray-500 text-sm">Stock mínimo: 3</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-check-circle mr-1"></i> Disponible
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-purple-600 hover:text-purple-900 p-1" title="Ajustar inventario">
                                <i class="fas fa-boxes"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Material 2 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">MAT-002</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">Teclado Universal</div>
                        <div class="text-gray-500 text-sm">Para laptop 14-15"</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-900">Teclado en español con numpad</div>
                        <div class="text-gray-500 text-sm">Color negro, retroiluminado</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">$380.00</div>
                        <div class="text-gray-500 text-sm">MXN</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">3 unidades</div>
                        <div class="text-gray-500 text-sm">Stock mínimo: 5</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-exclamation-triangle mr-1"></i> Stock Bajo
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 p-1" title="Solicitar compra">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Material 3 -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">MAT-003</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">Batería Laptop</div>
                        <div class="text-gray-500 text-sm">Para HP Pavilion</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-900">Batería de litio 4400mAh</div>
                        <div class="text-gray-500 text-sm">6 celdas, original</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900">$650.00</div>
                        <div class="text-gray-500 text-sm">MXN</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">0 unidades</div>
                        <div class="text-gray-500 text-sm">Agotado hace 5 días</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded flex items-center w-fit">
                            <i class="fas fa-times-circle mr-1"></i> Agotado
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-900 p-1" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 p-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 p-1" title="Solicitar compra">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Alertas de Stock Bajo -->
    <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-lg p-4">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle text-yellow-600 text-xl mr-3"></i>
            <div>
                <h3 class="font-semibold text-yellow-800">Alertas de Inventario</h3>
                <p class="text-yellow-700 text-sm">5 materiales tienen stock bajo o están agotados</p>
            </div>
            <a href="#" class="ml-auto text-yellow-700 hover:text-yellow-900 font-medium">
                Ver reporte completo →
            </a>
        </div>
    </div>
</div>
@endsection
