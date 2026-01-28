@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-laptop mr-2"></i> Formulario de Equipo
        </h1>
        <p class="text-gray-600 mb-6">Registre un nuevo equipo en el sistema</p>

        <!-- Formulario -->
        <form class="space-y-6">
            <!-- Información Básica -->
            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-info-circle mr-2"></i> Información del Equipo
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Modelo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Modelo *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Inspiron 15">
                    </div>
                    
                    <!-- Marca -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Marca *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Dell, HP, Lenovo">
                    </div>
                </div>
            </div>

            <!-- Características -->
            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-cogs mr-2"></i> Características
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Año -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Año</label>
                        <input type="number" min="2000" max="2024" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="2024">
                    </div>
                    
                    <!-- Tipo de Equipo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tipo de Equipo *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione tipo</option>
                            <option value="laptop">Laptop</option>
                            <option value="desktop">Desktop</option>
                            <option value="tablet">Tablet</option>
                            <option value="smartphone">Smartphone</option>
                            <option value="impresora">Impresora</option>
                            <option value="monitor">Monitor</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                    
                    <!-- Color -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Color</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Negro, Plateado">
                    </div>
                </div>
            </div>

            <!-- Condición -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Condición Física *</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleccione condición</option>
                    <option value="excelente">Excelente</option>
                    <option value="buena">Buena</option>
                    <option value="regular">Regular</option>
                    <option value="mala">Mala</option>
                    <option value="dañado">Dañado</option>
                </select>
                <p class="mt-1 text-sm text-gray-500">Describe el estado físico del equipo</p>
            </div>

            <!-- Observaciones -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Observaciones (Opcional)</label>
                <textarea rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Notas adicionales sobre el equipo..."></textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="/equipos" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fas fa-save mr-2"></i> Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
