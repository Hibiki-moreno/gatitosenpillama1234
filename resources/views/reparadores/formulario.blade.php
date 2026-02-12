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

        <!-- Formulario con IMAGEN -->
        <form method="POST" 
              enctype="multipart/form-data"
              action="{{ isset($reparador) ? route('reparadores.update', $reparador) : route('reparadores.store') }}" 
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
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nombres *</label>
                        <input type="text" name="nombres" 
                               value="{{ old('nombres', $reparador->nombres ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('nombres') border-red-500 @enderror">
                        @error('nombres') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Apellido Paterno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno *</label>
                        <input type="text" name="apellido_paterno" 
                               value="{{ old('apellido_paterno', $reparador->apellido_paterno ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('apellido_paterno') border-red-500 @enderror">
                        @error('apellido_paterno') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Apellido Materno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" name="apellido_materno" 
                               value="{{ old('apellido_materno', $reparador->apellido_materno ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
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
                        <label class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                        <input type="email" name="correo" 
                               value="{{ old('correo', $reparador->correo ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('correo') border-red-500 @enderror">
                        @error('correo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Celular -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Celular *</label>
                        <input type="tel" name="celular" 
                               value="{{ old('celular', $reparador->celular ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('celular') border-red-500 @enderror">
                        @error('celular') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-briefcase mr-2"></i> Información Profesional
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Especialidad -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Especialidad *</label>
                        <select name="especialidad_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('especialidad_id') border-red-500 @enderror">
                            <option value="">Seleccione especialidad</option>
                            @foreach($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}" 
                                        {{ (old('especialidad_id', $reparador->especialidad_id ?? '') == $especialidad->id) ? 'selected' : '' }}>
                                    {{ $especialidad->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('especialidad_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Años de Experiencia -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Años de Experiencia</label>
                        <input type="number" name="anios_experiencia" 
                               min="0" max="50" 
                               value="{{ old('anios_experiencia', $reparador->anios_experiencia ?? 0) }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                    </div>
                </div>
            </div>

            <!-- SECCIÓN DE IMAGEN - AGREGADA -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-image mr-2"></i> Foto del Reparador
                </h2>
                
                @if(isset($reparador) && $reparador->imagen)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Foto actual</label>
                    <img src="{{ asset('storage/' . $reparador->imagen) }}" 
                         alt="Foto del reparador"
                         class="h-24 w-24 object-cover rounded-lg border-2 border-gray-200">
                    <p class="text-xs text-gray-500 mt-1">{{ basename($reparador->imagen) }}</p>
                </div>
                @endif

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        {{ isset($reparador) ? 'Cambiar foto (opcional)' : 'Foto de perfil *' }}
                    </label>
                    <input type="file" 
                           name="imagen" 
                           accept="image/jpeg,image/png,image/jpg,image/webp"
                           {{ isset($reparador) ? '' : 'required' }}
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2 @error('imagen') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">
                        JPG, PNG, WEBP (Máx. 2MB)
                        @if(!isset($reparador))
                            <span class="text-red-600 font-semibold">* Obligatorio</span>
                        @endif
                    </p>
                    @error('imagen')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-calendar-alt mr-2"></i> Horario y Estado
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Turno -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Turno *</label>
                        <select name="turno" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="matutino" {{ (old('turno', $reparador->turno ?? '') == 'matutino') ? 'selected' : '' }}>Matutino (8:00 AM - 4:00 PM)</option>
                            <option value="vespertino" {{ (old('turno', $reparador->turno ?? '') == 'vespertino') ? 'selected' : '' }}>Vespertino (2:00 PM - 10:00 PM)</option>
                            <option value="nocturno" {{ (old('turno', $reparador->turno ?? '') == 'nocturno') ? 'selected' : '' }}>Nocturno (10:00 PM - 6:00 AM)</option>
                            <option value="mixto" {{ (old('turno', $reparador->turno ?? '') == 'mixto') ? 'selected' : '' }}>Mixto</option>
                        </select>
                    </div>
                    
                    <!-- Estado -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                        <select name="estado" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="activo" {{ (old('estado', $reparador->estado ?? '') == 'activo') ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ (old('estado', $reparador->estado ?? '') == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
                            <option value="vacaciones" {{ (old('estado', $reparador->estado ?? '') == 'vacaciones') ? 'selected' : '' }}>Vacaciones</option>
                            <option value="licencia" {{ (old('estado', $reparador->estado ?? '') == 'licencia') ? 'selected' : '' }}>Licencia</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="{{ route('reparadores.index') }}" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> 
                    {{ isset($reparador) ? 'Actualizar' : 'Guardar' }} Reparador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection