@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-plus mr-2"></i> Formulario de Cliente
        </h1>
        <p class="text-gray-600 mb-6">Complete todos los campos para registrar un nuevo cliente</p>

        <!-- Formulario Flowbite -->
        <form class="space-y-6">
            <!-- Información Personal -->
            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-id-card mr-2"></i> Información Personal
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Nombres -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nombres *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    
                    <!-- Apellido Paterno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    
                    <!-- Apellido Materno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
            </div>

            <!-- Información de Contacto -->
            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-address-book mr-2"></i> Información de Contacto
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Celular -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Celular *</label>
                        <input type="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    
                    <!-- Correo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                        <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>
            </div>

            <!-- Dirección -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Dirección *</label>
                <textarea rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- Estado -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Seleccione un estado</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="/clientes" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fas fa-save mr-2"></i> Guardar Cliente
                </button>
            </div>
        </form>
    </div>
</div>
@endsection