@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-boxes mr-2"></i> Nuevo Material
        </h1>
        <p class="text-gray-600 mb-6">Registre un nuevo material en el inventario</p>

        <!-- Formulario -->
        <form class="space-y-6">
            <!-- Sección 1: Información Básica -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-info-circle mr-2"></i> Información Básica
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nombre -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del Material *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Pantalla LCD 15.6&quot;">
                    </div>
                    
                    <!-- Categoría -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Categoría *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione categoría</option>
                            <option value="pantallas">Pantallas</option>
                            <option value="teclados">Teclados</option>
                            <option value="baterias">Baterías</option>
                            <option value="cargadores">Cargadores</option>
                            <option value="discos">Discos Duros/SSD</option>
                            <option value="memorias">Memorias RAM</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sección 2: Descripción -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-align-left mr-2"></i> Descripción
                </h2>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Descripción *</label>
                    <textarea rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Describa el material, especificaciones técnicas, compatibilidad, etc."></textarea>
                    <p class="mt-1 text-sm text-gray-500">Incluya información relevante para identificarlo</p>
                </div>
            </div>

            <!-- Sección 3: Precio y Existencia -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-money-bill-wave mr-2"></i> Precio y Existencia
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Precio Unitario -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Precio Unitario (MXN) *</label>
                        <input type="number" step="0.01" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0.00">
                    </div>
                    
                    <!-- Cantidad Inicial -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Cantidad Inicial *</label>
                        <input type="number" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0">
                    </div>
                    
                    <!-- Stock Mínimo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Stock Mínimo</label>
                        <input type="number" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="5">
                        <p class="mt-1 text-sm text-gray-500">Alerta cuando baje de esta cantidad</p>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Estado y Ubicación -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-warehouse mr-2"></i> Estado y Ubicación
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Estado -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="disponible">Disponible</option>
                            <option value="agotado">Agotado</option>
                            <option value="reservado">Reservado</option>
                            <option value="descontinuado">Descontinuado</option>
                        </select>
                    </div>
                    
                    <!-- Ubicación en Almacén -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Ubicación en Almacén</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Estante A-3, Bandeja 2">
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/materiales" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> Guardar Material
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
