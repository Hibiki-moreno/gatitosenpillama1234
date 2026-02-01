@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-camera mr-2"></i> Nueva Evidencia
        </h1>
        <p class="text-gray-600 mb-6">Registro fotográfico de reparaciones</p>

        <form method="POST" action="{{ url('/evidencias') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Sección 1: Información del Ticket -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-ticket-alt mr-2"></i> Información del Ticket
                </h2>
                
                <div>
                    <label for="ticket_id" class="block mb-2 text-sm font-medium text-gray-900">
                        Ticket Relacionado *
                    </label>
                    <select id="ticket_id" name="ticket_id" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        <option value="">Seleccione un ticket</option>
                        @foreach($tickets as $ticket)
                            <option value="{{ $ticket->id }}" {{ old('ticket_id') == $ticket->id ? 'selected' : '' }}>
                                Ticket #{{ $ticket->id }} - {{ $ticket->problema }}
                            </option>
                        @endforeach
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
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">
                        Descripción *
                    </label>
                    <textarea id="descripcion" name="descripcion" rows="4" 
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                              placeholder="Describa lo que muestra la evidencia, fallas encontradas, observaciones importantes..."
                              required>{{ old('descripcion') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Sea específico sobre lo que se observa en la imagen</p>
                </div>
            </div>

            <!-- Sección 3: Imagen -->
            <div class="border-b pb-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-image mr-2"></i> Imagen
                </h2>
                
                <div>
                    <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900">
                        Subir Imagen *
                    </label>
                    <input type="file" id="imagen" name="imagen" 
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                           accept="image/png,image/jpeg,image/jpg"
                           required>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg border border-dashed border-gray-300 text-center">
                        <p class="text-gray-500">Haga clic para subir o arrastre y suelte</p>
                        <p class="text-sm text-gray-400">PNG, JPG o JPEG (MAX. 5MB)</p>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Información Adicional -->
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-4">
                    <i class="fas fa-info-circle mr-2"></i> Información Adicional
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Fecha -->
                    <div>
                        <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900">
                            Fecha de la Evidencia
                        </label>
                        <input type="date" id="fecha" name="fecha" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               value="{{ old('fecha') }}">
                    </div>
                    
                    <!-- Técnico -->
                    <div>
                        <label for="tecnico_id" class="block mb-2 text-sm font-medium text-gray-900">
                            Técnico Responsable
                        </label>
                        <select id="tecnico_id" name="tecnico_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Seleccione técnico</option>
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>
                                    {{ $tecnico->nombres }} {{ $tecnico->apellido_paterno }}
                                </option>
                            @endforeach
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
@endsection