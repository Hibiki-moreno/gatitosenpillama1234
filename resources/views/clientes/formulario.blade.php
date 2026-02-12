@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-user-plus mr-2"></i>
            {{ isset($cliente) ? 'Editar Cliente' : 'Formulario de Cliente' }}
        </h1>
        <p class="text-gray-600 mb-6">
            {{ isset($cliente) ? 'Modifique los datos del cliente' : 'Complete todos los campos para registrar un nuevo cliente' }}
        </p>

        {{-- ✅ CORREGIDO: action con route() --}}
        <form method="POST" 
              enctype="multipart/form-data"
              action="{{ isset($cliente) ? route('clientes.update', $cliente) : route('clientes.store') }}"
              class="space-y-6">
            @csrf
            @if(isset($cliente))
                @method('PUT')
            @endif

            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-id-card mr-2"></i> Información Personal
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nombres *</label>
                        <input type="text" name="nombres"
                               value="{{ old('nombres', $cliente->nombres ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('nombres') border-red-500 @enderror">
                        @error('nombres')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno *</label>
                        <input type="text" name="apellido_paterno"
                               value="{{ old('apellido_paterno', $cliente->apellido_paterno ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('apellido_paterno') border-red-500 @enderror">
                        @error('apellido_paterno')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" name="apellido_materno"
                               value="{{ old('apellido_materno', $cliente->apellido_materno ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                    </div>
                </div>
            </div>

            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-address-book mr-2"></i> Información de Contacto
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Celular *</label>
                        <input type="tel" name="celular"
                               value="{{ old('celular', $cliente->celular ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('celular') border-red-500 @enderror">
                        @error('celular')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico *</label>
                        <input type="email" name="correo"
                               value="{{ old('correo', $cliente->correo ?? '') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('correo') border-red-500 @enderror">
                        @error('correo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Dirección *</label>
                <textarea rows="3" name="direccion"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border @error('direccion') border-red-500 @enderror">{{ old('direccion', $cliente->direccion ?? '') }}</textarea>
                @error('direccion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ========== SECCIÓN DE IMAGEN - CORREGIDA ========== --}}
            <div class="border-b pb-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-image mr-2"></i> Foto del Cliente
                </h2>

                <div class="space-y-4">
                    {{-- ✅ MOSTRAR IMAGEN ACTUAL (SOLO EN EDICIÓN) --}}
                    @if(isset($cliente) && $cliente->imagen)
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Foto actual</label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('storage/' . $cliente->imagen) }}" 
                                     alt="Foto del cliente"
                                     class="h-24 w-24 object-cover rounded-lg border-2 border-gray-200">
                                <div class="text-sm text-gray-500">
                                    <p>Nombre: {{ basename($cliente->imagen) }}</p>
                                    <p class="text-xs text-yellow-600">⚠️ Se reemplazará si subes una nueva</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- ✅ INPUT DE IMAGEN - REQUIRED EN CREATE, OPCIONAL EN EDIT --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">
                            {{ isset($cliente) ? 'Cambiar foto (opcional)' : 'Foto de perfil *' }}
                        </label>
                        <input type="file" 
                               name="imagen" 
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               {{ isset($cliente) ? '' : 'required' }}
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2 @error('imagen') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">
                            JPG, PNG, WEBP (Máx. 2MB). 
                            @if(!isset($cliente))
                                <span class="text-red-600 font-semibold">* Campo obligatorio</span>
                            @else
                                <span class="text-gray-500">Dejar vacío para mantener la imagen actual</span>
                            @endif
                        </p>
                        @error('imagen')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                <select name="estado"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 @error('estado') border-red-500 @enderror">
                    <option value="">Seleccione un estado</option>
                    <option value="activo" {{ (old('estado', $cliente->estado ?? '')=='activo')?'selected':'' }}>Activo</option>
                    <option value="inactivo" {{ (old('estado', $cliente->estado ?? '')=='inactivo')?'selected':'' }}>Inactivo</option>
                    <option value="pendiente" {{ (old('estado', $cliente->estado ?? '')=='pendiente')?'selected':'' }}>Pendiente</option>
                </select>
                @error('estado')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="{{ route('clientes.index') }}"
                   class="px-5 py-2.5 text-gray-900 bg-white border rounded-lg hover:bg-gray-50">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    {{ isset($cliente) ? 'Actualizar Cliente' : 'Guardar Cliente' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection