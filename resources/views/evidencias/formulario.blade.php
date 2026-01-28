@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-camera mr-2"></i> Nueva Evidencia
        </h1>
        <p class="text-gray-600 mb-6">Registre evidencia fotográfica de reparación o diagnóstico</p>

        <!-- Formulario -->
        <form class="space-y-6">
            <!-- Sección 1: Información del Ticket -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-ticket-alt mr-2"></i> Información del Ticket
                </h2>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Ticket Relacionado *</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Seleccione un ticket</option>
                        <option value="T001">T001 - Pantalla no enciende (Cliente: Juan Pérez)</option>
                        <option value="T002">T002 - Teclado dañado (Cliente: María García)</option>
                        <option value="T003">T003 - No carga la batería (Cliente: Roberto Sánchez)</option>
                    </select>
                    <p class="mt-1 text-sm text-gray-500">Seleccione el ticket al que pertenece esta evidencia</p>
                </div>
            </div>

            <!-- Sección 2: Descripción -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-align-left mr-2"></i> Descripción
                </h2>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Descripción *</label>
                    <textarea rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Describa lo que muestra la evidencia, fallas encontradas, observaciones importantes..."></textarea>
                    <p class="mt-1 text-sm text-gray-500">Sea específico sobre lo que se observa en la imagen</p>
                </div>
            </div>

            <!-- Sección 3: Imagen -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-image mr-2"></i> Imagen
                </h2>
                
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Subir Imagen *</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Haga clic para subir</span> o arrastre y suelte
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG o JPEG (MAX. 5MB)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    
                    <!-- Vista previa -->
                    <div class="mt-4 hidden" id="image-preview">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Vista Previa</label>
                        <div class="border border-gray-300 rounded-lg p-4">
                            <div class="flex items-center justify-center">
                                <img id="preview-image" class="max-h-48 rounded" src="" alt="Vista previa">
                            </div>
                            <button type="button" id="remove-image" class="mt-2 text-red-600 hover:text-red-900 text-sm">
                                <i class="fas fa-trash mr-1"></i> Eliminar imagen
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Información Adicional -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-calendar-alt mr-2"></i> Información Adicional
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Fecha -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Fecha de la Evidencia</label>
                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    
                    <!-- Técnico Responsable -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Técnico Responsable</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione técnico</option>
                            <option value="R001">Carlos Mendoza (Electrónica)</option>
                            <option value="R002">Ana Torres (Software)</option>
                            <option value="R003">José Luis Hernández (General)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/evidencias" 
                   class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
                <button type="submit" 
                        class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    <i class="fas fa-save mr-2"></i> Guardar Evidencia
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Script para vista previa de imagen
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('dropzone-file');
    const imagePreview = document.getElementById('image-preview');
    const previewImage = document.getElementById('preview-image');
    const removeButton = document.getElementById('remove-image');
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    
    removeButton.addEventListener('click', function() {
        fileInput.value = '';
        previewImage.src = '';
        imagePreview.classList.add('hidden');
    });
});
</script>
@endsection
