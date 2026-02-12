@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-cog mr-2"></i> 
            @isset($reparador) Editar Reparador @else Nuevo Reparador @endisset
        </h1>
        <p class="text-gray-600 mb-6">
            @isset($reparador) 
                Modifique la información del reparador 
            @else 
                Registre un nuevo técnico en el sistema
            @endisset
        </p>

        <!-- Formulario -->
        <form method="POST" 
              action="@isset($reparador) {{ url('/reparadores/' . $reparador->id) }} @else {{ url('/reparadores') }} @endisset" 
              class="space-y-6">
            @csrf
            
            @isset($reparador)
                @method('PUT')
            @endisset
            
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-id-card mr-2"></i> Información Personal
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Nombres -->
                    <div>
                        <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900">Nombres *</label>
                        <input type="text" id="nombres" name="nombres" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="Ej: Carlos"
                               value="{{ old('nombres', $reparador->nombres ?? '') }}"
                               required>
                    </div>
                    
                    <!-- Apellido Paterno -->
                    <div>
                        <label for="apellido_paterno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno *</label>
                        <input type="text" id="apellido_paterno" name="apellido_paterno" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="Ej: Mendoza"
                               value="{{ old('apellido_paterno', $reparador->apellido_paterno ?? '') }}"
                               required>
                    </div>
                    
                    <!-- Apellido Materno -->
                    <div>
                        <label for="apellido_materno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" id="apellido_materno" name="apellido_materno" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="Ej: López"
                               value="{{ old('apellido_materno', $reparador->apellido_materno ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-address-book mr-2"></i> Información de Contacto
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Correo -->
                    <div>
                        <label for="correo" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                        <input type="email" id="correo" name="correo" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="ejemplo@email.com"
                               value="{{ old('correo', $reparador->correo ?? '') }}"
                               required>
                    </div>
                    
                    <!-- Celular -->
                    <div>
                        <label for="celular" class="block mb-2 text-sm font-medium text-gray-900">Celular *</label>
                        <input type="tel" id="celular" name="celular" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="555-123-4567"
                               value="{{ old('celular', $reparador->celular ?? '') }}"
                               required>
                    </div>
                </div>
            </div>

            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-briefcase mr-2"></i> Información Profesional
                    <br>
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

<div class="border-b pb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">

    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Especialidad -->
        <div>
            <label for="especialidad_id" class="block mb-2 text-sm font-medium text-gray-900">Especialidad *</label>
            <select id="especialidad_id" name="especialidad_id" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                <option value="">Seleccione especialidad</option>
                @foreach($especialidades as $especialidad)
                    <option value="{{ $especialidad->id }}" 
                            {{ (old('especialidad_id', $reparador->especialidad_id ?? '') == $especialidad->id) ? 'selected' : '' }}>
                        {{ $especialidad->nombre }} <!-- CAMBIADO A 'nombre' -->
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Años de Experiencia -->
        <div>
            <label for="anios_experiencia" class="block mb-2 text-sm font-medium text-gray-900">Años de Experiencia</label>
            <input type="number" id="anios_experiencia" name="anios_experiencia" 
                   min="0" max="50" 
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                   placeholder="Ej: 3"
                   value="{{ old('anios_experiencia', $reparador->anios_experiencia ?? 0) }}">
        </div>
    </div>
</div>
                    
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-calendar-alt mr-2"></i> Horario y Estado
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Turno -->
                    <div>
                        <label for="turno" class="block mb-2 text-sm font-medium text-gray-900">Turno *</label>
                        <select id="turno" name="turno" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            <option value="matutino" {{ (old('turno', $reparador->turno ?? '') == 'matutino') ? 'selected' : '' }}>Matutino (8:00 AM - 4:00 PM)</option>
                            <option value="vespertino" {{ (old('turno', $reparador->turno ?? '') == 'vespertino') ? 'selected' : '' }}>Vespertino (2:00 PM - 10:00 PM)</option>
                            <option value="nocturno" {{ (old('turno', $reparador->turno ?? '') == 'nocturno') ? 'selected' : '' }}>Nocturno (10:00 PM - 6:00 AM)</option>
                            <option value="mixto" {{ (old('turno', $reparador->turno ?? '') == 'mixto') ? 'selected' : '' }}>Mixto</option>
                        </select>
                    </div>
                    
                    <!-- Estado -->
                    <div>
                        <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                        <select id="estado" name="estado" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            <option value="activo" {{ (old('estado', $reparador->estado ?? '') == 'activo') ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ (old('estado', $reparador->estado ?? '') == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
                            <option value="vacaciones" {{ (old('estado', $reparador->estado ?? '') == 'vacaciones') ? 'selected' : '' }}>Vacaciones</option>
                            <option value="licencia" {{ (old('estado', $reparador->estado ?? '') == 'licencia') ? 'selected' : '' }}>Licencia</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/reparadores" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> 
                    @isset($reparador) Actualizar @else Guardar @endisset Reparador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection