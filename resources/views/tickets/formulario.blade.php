@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-ticket-alt mr-2"></i> Nuevo Ticket de Reparación
        </h1>
        <p class="text-gray-600 mb-6">Complete el formulario para registrar un nuevo ticket</p>

        <!-- Formulario -->
        <form class="space-y-8">
            <!-- Sección 1: Información del Cliente y Equipo -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-user-circle mr-2"></i> Cliente y Equipo
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cliente -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Cliente *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione un cliente</option>
                            <option value="1">Juan Pérez López - 555-123-4567</option>
                            <option value="2">María García Rodríguez - 555-987-6543</option>
                            <option value="3">Roberto Sánchez - 555-456-7890</option>
                        </select>
                    </div>
                    
                    <!-- Equipo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Equipo *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione un equipo</option>
                            <option value="1">Dell Inspiron 15 (Laptop, 2023)</option>
                            <option value="2">HP Pavilion (Laptop, 2022)</option>
                            <option value="3">Lenovo ThinkPad (Laptop, 2021)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sección 2: Descripción del Problema -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Descripción del Problema
                </h2>
                
                <div class="space-y-4">
                    <!-- Problema -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Problema Reportado *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Pantalla no enciende, no carga, etc.">
                    </div>
                    
                    <!-- Diagnóstico Inicial -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Diagnóstico Inicial</label>
                        <textarea rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Observaciones iniciales del técnico..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Sección 3: Detalles de la Reparación -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-cogs mr-2"></i> Detalles de la Reparación
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Tipo de Reparación -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Tipo de Reparación</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="correctiva">Correctiva</option>
                            <option value="preventiva">Preventiva</option>
                            <option value="mantenimiento">Mantenimiento</option>
                        </select>
                    </div>
                    
                    <!-- Prioridad -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Prioridad *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>
                            <option value="urgente">Urgente</option>
                        </select>
                    </div>
                    
                    <!-- Estado -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Estado Inicial</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="pendiente">Pendiente</option>
                            <option value="diagnostico">En Diagnóstico</option>
                            <option value="espera">En Espera de Refacciones</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Información Financiera -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <i class="fas fa-money-bill-wave mr-2"></i> Información Financiera
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Método de Pago -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Método de Pago</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                            <option value="transferencia">Transferencia Bancaria</option>
                            <option value="pendiente">Por Definir</option>
                        </select>
                    </div>
                    
                    <!-- Total Estimado -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Total Estimado (MXN)</label>
                        <input type="number" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0.00">
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/tickets" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> Guardar Ticket
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
