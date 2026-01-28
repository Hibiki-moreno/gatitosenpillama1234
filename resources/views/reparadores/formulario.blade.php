@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-cog mr-2"></i> Nuevo Reparador
        </h1>
        <p class="text-gray-600 mb-6">Registre un nuevo técnico en el sistema</p>

        <!-- Formulario -->
        <form class="space-y-6">
            <!-- Sección 1: Información Personal -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-id-card mr-2"></i> Información Personal
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Nombres -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nombres *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Carlos">
                    </div>
                    
                    <!-- Apellido Paterno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno *</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: Mendoza">
                    </div>
                    
                    <!-- Apellido Materno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: López">
                    </div>
                </div>
            </div>

            <!-- Sección 2: Información de Contacto -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-address-book mr-2"></i> Información de Contacto
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Correo -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                        <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ejemplo@email.com">
                    </div>
                    
                    <!-- Celular -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Celular *</label>
                        <input type="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="555-123-4567">
                    </div>
                </div>
            </div>

            <!-- Sección 3: Información Profesional -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-briefcase mr-2"></i> Información Profesional
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Especialidad -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Especialidad *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione especialidad</option>
                            <option value="electronica">Electrónica</option>
                            <option value="software">Software</option>
                            <option value="hardware">Hardware</option>
                            <option value="redes">Redes</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                    
                    <!-- Años de Experiencia -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Años de Experiencia</label>
                        <input type="number" min="0" max="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ej: 3">
                    </div>
                </div>
            </div>

            <!-- Sección 4: Horario y Estado -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-calendar-alt mr-2"></i> Horario y Estado
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Turno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Turno *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="matutino">Matutino (8:00 AM - 4:00 PM)</option>
                            <option value="vespertino">Vespertino (2:00 PM - 10:00 PM)</option>
                            <option value="nocturno">Nocturno (10:00 PM - 6:00 AM)</option>
                            <option value="mixto">Mixto</option>
                        </select>
                    </div>
                    
                    <!-- Estado -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="vacaciones">Vacaciones</option>
                            <option value="licencia">Licencia</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/reparadores" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> Guardar Reparador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
