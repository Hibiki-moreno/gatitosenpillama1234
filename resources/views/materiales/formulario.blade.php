@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-box mr-2"></i>
            {{ isset($material) ? 'Editar Material' : 'Nuevo Material' }}
        </h1>

        <form method="POST" 
              enctype="multipart/form-data"
              action="{{ isset($material) ? route('materiales.update', $material) : route('materiales.store') }}">
            @csrf
            @if(isset($material)) @method('PUT') @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Nombre *</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $material->nombre ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('nombre') border-red-500 @enderror">
                    @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Categoria</label>
                    <input type="text" name="categoria" value="{{ old('categoria', $material->categoria ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5"
                           placeholder="Ej: Electrónica, Herramientas">
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium">Descripción</label>
                <textarea name="descripcion" rows="2"
                          class="bg-gray-50 border rounded-lg w-full p-2.5">{{ old('descripcion', $material->descripcion ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio_unitario" 
                           value="{{ old('precio_unitario', $material->precio_unitario ?? 0) }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Existencia *</label>
                    <input type="number" name="existencia" 
                           value="{{ old('existencia', $material->existencia ?? 0) }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5 @error('existencia') border-red-500 @enderror">
                    @error('existencia') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Stock Mínimo</label>
                    <input type="number" name="stock_minimo" 
                           value="{{ old('stock_minimo', $material->stock_minimo ?? 5) }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-2 text-sm font-medium">Ubicación en Almacén</label>
                    <input type="text" name="ubicacion_almacen" 
                           value="{{ old('ubicacion_almacen', $material->ubicacion_almacen ?? '') }}"
                           class="bg-gray-50 border rounded-lg w-full p-2.5"
                           placeholder="Ej: Estante A, Nivel 3">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium">Estado *</label>
                    <select name="estado" class="bg-gray-50 border rounded-lg w-full p-2.5">
                        <option value="disponible" {{ (old('estado', $material->estado ?? '') == 'disponible') ? 'selected' : '' }}>Disponible</option>
                        <option value="agotado" {{ (old('estado', $material->estado ?? '') == 'agotado') ? 'selected' : '' }}>Agotado</option>
                        <option value="en_pedido" {{ (old('estado', $material->estado ?? '') == 'en_pedido') ? 'selected' : '' }}>En Pedido</option>
                        <option value="descontinuado" {{ (old('estado', $material->estado ?? '') == 'descontinuado') ? 'selected' : '' }}>Descontinuado</option>
                    </select>
                </div>
            </div>

            <!-- SECCIÓN DE IMAGEN - OBLIGATORIA -->
            <div class="border-t pt-4 mb-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-image mr-2"></i> Imagen del Material
                </h2>
                
                @if(isset($material) && $material->imagen)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium">Imagen actual</label>
                    <img src="{{ asset('storage/' . $material->imagen) }}" 
                         alt="Material"
                         class="h-32 w-32 object-cover rounded-lg border-2">
                    <p class="text-xs text-gray-500 mt-1">{{ basename($material->imagen) }}</p>
                </div>
                @endif

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        {{ isset($material) ? 'Cambiar imagen (opcional)' : 'Imagen del material *' }}
                    </label>
                    <input type="file" 
                           name="imagen" 
                           accept="image/jpeg,image/png,image/jpg,image/webp"
                           {{ isset($material) ? '' : 'required' }}
                           class="block w-full text-sm border rounded-lg cursor-pointer bg-gray-50 p-2 @error('imagen') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">
                        JPG, PNG, WEBP (Máx. 2MB)
                        @if(!isset($material))
                            <span class="text-red-600 font-semibold">* Obligatorio</span>
                        @endif
                    </p>
                    @error('imagen')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="{{ route('materiales.index') }}" 
                   class="px-5 py-2.5 bg-gray-100 rounded-lg hover:bg-gray-200">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 bg-blue-700 text-white rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i>
                    {{ isset($material) ? 'Actualizar' : 'Guardar' }} Material
                </button>
            </div>
        </form>
    </div>
</div>
@endsection