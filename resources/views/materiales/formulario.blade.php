@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-boxes mr-2"></i> 
            @isset($material) Editar Material @else Nuevo Material @endisset
        </h1>
        <p class="text-gray-600 mb-6">
            @isset($material) 
                Modifique la información del material 
            @else 
                Registre un nuevo material en el inventario
            @endisset
        </p>

        <form method="POST" 
              action="@isset($material) {{ url('/materiales/' . $material->id) }} @else {{ url('/materiales') }} @endisset" 
              class="space-y-6">
            @csrf
            
            @isset($material)
                @method('PUT')
            @endisset
            
            
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-info-circle mr-2"></i> Información Básica
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Material *</label>
                        <input type="text" id="nombre" name="nombre" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="Ej: Pantalla LCD 15.6&quot;"
                               value="{{ old('nombre', $material->nombre ?? '') }}"
                               required>
                        @error('nombre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div>
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900">Categoría *</label>
                        <select id="categoria" name="categoria" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            <option value="">Seleccione categoría</option>
                            <option value="pantallas" {{ (old('categoria', $material->categoria ?? '') == 'pantallas') ? 'selected' : '' }}>Pantallas</option>
                            <option value="teclados" {{ (old('categoria', $material->categoria ?? '') == 'teclados') ? 'selected' : '' }}>Teclados</option>
                            <option value="baterias" {{ (old('categoria', $material->categoria ?? '') == 'baterias') ? 'selected' : '' }}>Baterías</option>
                            <option value="cargadores" {{ (old('categoria', $material->categoria ?? '') == 'cargadores') ? 'selected' : '' }}>Cargadores</option>
                            <option value="discos" {{ (old('categoria', $material->categoria ?? '') == 'discos') ? 'selected' : '' }}>Discos Duros/SSD</option>
                            <option value="memorias" {{ (old('categoria', $material->categoria ?? '') == 'memorias') ? 'selected' : '' }}>Memorias RAM</option>
                            <option value="otros" {{ (old('categoria', $material->categoria ?? '') == 'otros') ? 'selected' : '' }}>Otros</option>
                        </select>
                        @error('categoria')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-align-left mr-2"></i> Descripción
                </h2>
                
                <div>
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción *</label>
                    <textarea id="descripcion" name="descripcion" rows="4" 
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                              placeholder="Describa el material, especificaciones técnicas, compatibilidad, etc."
                              required>{{ old('descripcion', $material->descripcion ?? '') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Incluya información relevante para identificarlo</p>
                    @error('descripcion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-money-bill-wave mr-2"></i> Precio y Existencia
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="precio_unitario" class="block mb-2 text-sm font-medium text-gray-900">Precio Unitario (MXN) *</label>
                        <input type="number" id="precio_unitario" name="precio_unitario" 
                               step="0.01" min="0" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="0.00"
                               value="{{ old('precio_unitario', $material->precio_unitario ?? '') }}"
                               required>
                        @error('precio_unitario')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div>
                        <label for="cantidad_inicial" class="block mb-2 text-sm font-medium text-gray-900">Cantidad Inicial *</label>
                        <input type="number" id="cantidad_inicial" name="cantidad_inicial" 
                               min="0" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="0"
                               value="{{ old('cantidad_inicial', $material->cantidad_inicial ?? 0) }}"
                               required>
                        @error('cantidad_inicial')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    @isset($material)
                        <div>
                            <label for="existencia" class="block mb-2 text-sm font-medium text-gray-900">Existencia Actual *</label>
                            <input type="number" id="existencia" name="existencia" 
                                   min="0" 
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                   value="{{ old('existencia', $material->existencia) }}"
                                   required>
                            <p class="mt-1 text-sm text-gray-500">Cantidad actual en almacén</p>
                            @error('existencia')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                    
                        <div>
                            <label for="stock_minimo" class="block mb-2 text-sm font-medium text-gray-900">Stock Mínimo</label>
                            <input type="number" id="stock_minimo" name="stock_minimo" 
                                   min="0" 
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                                   placeholder="5"
                                   value="{{ old('stock_minimo', $material->stock_minimo ?? 5) }}">
                            <p class="mt-1 text-sm text-gray-500">Alerta cuando baje de esta cantidad</p>
                            @error('stock_minimo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endisset
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-warehouse mr-2"></i> Estado y Ubicación
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado *</label>
                        <select id="estado" name="estado" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            <option value="disponible" {{ (old('estado', $material->estado ?? '') == 'disponible') ? 'selected' : '' }}>Disponible</option>
                            <option value="agotado" {{ (old('estado', $material->estado ?? '') == 'agotado') ? 'selected' : '' }}>Agotado</option>
                            <option value="reservado" {{ (old('estado', $material->estado ?? '') == 'reservado') ? 'selected' : '' }}>Reservado</option>
                            <option value="descontinuado" {{ (old('estado', $material->estado ?? '') == 'descontinuado') ? 'selected' : '' }}>Descontinuado</option>
                        </select>
                        @error('estado')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="ubicacion_almacen" class="block mb-2 text-sm font-medium text-gray-900">Ubicación en Almacén</label>
                        <input type="text" id="ubicacion_almacen" name="ubicacion_almacen" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                               placeholder="Ej: Estante A-3, Bandeja 2"
                               value="{{ old('ubicacion_almacen', $material->ubicacion_almacen ?? '') }}">
                        @error('ubicacion_almacen')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/materiales" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> 
                    @isset($material) Actualizar @else Guardar @endisset Material
                </button>
            </div>
        </form>
    </div>
</div>
@endsection