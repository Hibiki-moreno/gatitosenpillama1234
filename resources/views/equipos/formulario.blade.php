@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-laptop mr-2"></i>
            {{ isset($equipo) ? 'Editar Equipo' : 'Nuevo Equipo' }}
        </h1>

        <form method="POST" 
              enctype="multipart/form-data"
              action="{{ isset($equipo) ? route('equipos.update', $equipo) : route('equipos.store') }}">
            @csrf
            @if(isset($equipo)) @method('PUT') @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Marca *</label>
                    <input type="text" name="marca" value="{{ old('marca', $equipo->marca ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('marca') border-red-500 @enderror">
                    @error('marca') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Modelo *</label>
                    <input type="text" name="modelo" value="{{ old('modelo', $equipo->modelo ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('modelo') border-red-500 @enderror">
                    @error('modelo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Año *</label>
                    <input type="number" name="ano" min="2000" max="{{ date('Y') }}" 
                           value="{{ old('ano', $equipo->ano ?? date('Y')) }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('ano') border-red-500 @enderror">
                    @error('ano') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Color *</label>
                    <input type="text" name="color" value="{{ old('color', $equipo->color ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('color') border-red-500 @enderror">
                    @error('color') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium">Condición Física *</label>
                <select name="condicion_fisica" class="bg-gray-50 border rounded-lg w-full p-2.5">
                    <option value="">Seleccione</option>
                    <option value="excelente" {{ (old('condicion_fisica', $equipo->condicion_fisica ?? '') == 'excelente') ? 'selected' : '' }}>Excelente</option>
                    <option value="bueno" {{ (old('condicion_fisica', $equipo->condicion_fisica ?? '') == 'bueno') ? 'selected' : '' }}>Bueno</option>
                    <option value="regular" {{ (old('condicion_fisica', $equipo->condicion_fisica ?? '') == 'regular') ? 'selected' : '' }}>Regular</option>
                    <option value="malo" {{ (old('condicion_fisica', $equipo->condicion_fisica ?? '') == 'malo') ? 'selected' : '' }}>Malo</option>
                </select>
                @error('condicion_fisica') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- SECCIÓN DE 3 IMÁGENES - OBLIGATORIAS -->
            <div class="border-t pt-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-images mr-2"></i> Imágenes del Equipo (3 REQUERIDAS)
                </h2>
                
                @if(isset($equipo) && $equipo->imagenes->count() > 0)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium">Imágenes actuales</label>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($equipo->imagenes as $imagen)
                        <div class="text-center">
                            <img src="{{ $imagen->imagen_url }}" 
                                 alt="Imagen {{ $imagen->orden }}"
                                 class="h-24 w-full object-cover rounded-lg border-2">
                            <p class="text-xs text-gray-500 mt-1">Imagen {{ $imagen->orden }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @for($i = 1; $i <= 3; $i++)
                    <div>
                        <label class="block mb-2 text-sm font-medium">
                            Imagen {{ $i }} <span class="text-red-600">*</span>
                        </label>
                        <input type="file" 
                               name="imagenes[]" 
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               {{ !isset($equipo) ? 'required' : '' }}
                               class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 p-2">
                    </div>
                    @endfor
                </div>
                @if(!isset($equipo))
                    <p class="text-xs text-red-600 font-semibold mt-2">* Debes subir 3 imágenes obligatoriamente</p>
                @endif
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="{{ route('equipos.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-blue-700 text-white rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($equipo) ? 'Actualizar' : 'Guardar' }} Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection