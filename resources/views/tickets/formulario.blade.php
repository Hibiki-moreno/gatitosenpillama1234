@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            <i class="fas fa-ticket-alt mr-2"></i> Nuevo Ticket
        </h1>
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if(session('exito'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('exito') }}
            </div>
        @endif
        
        <form action="/tickets" method="POST" class="space-y-6">
            @csrf
            
            <!-- Cliente -->
            <div>
                <label class="block mb-2 font-medium text-gray-900">Cliente *</label>
                <select name="cliente_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" 
                                {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }} 
                            @if($cliente->telefono)
                                - {{ $cliente->telefono }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Equipo -->
            <div>
                <label class="block mb-2 font-medium text-gray-900">Equipo *</label>
                <select name="equipo_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                    <option value="">Seleccione un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}"
                                {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                            {{ $equipo->marca }} {{ $equipo->modelo }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Problema -->
            <div>
                <label class="block mb-2 font-medium text-gray-900">Problema *</label>
                <textarea name="problema" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" required>{{ old('problema') }}</textarea>
            </div>
            
            <!-- Diagnóstico -->
            <div>
                <label class="block mb-2 font-medium text-gray-900">Diagnóstico</label>
                <textarea name="diagnostico" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300">{{ old('diagnostico') }}</textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Tipo Reparación -->
                <div>
                    <label class="block mb-2 font-medium text-gray-900">Tipo Reparación</label>
                    <select name="tipo_reparacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="correctiva" {{ old('tipo_reparacion') == 'correctiva' ? 'selected' : '' }}>Correctiva</option>
                        <option value="preventiva" {{ old('tipo_reparacion') == 'preventiva' ? 'selected' : '' }}>Preventiva</option>
                        <option value="mantenimiento" {{ old('tipo_reparacion') == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                    </select>
                </div>
                
                <!-- Prioridad -->
                <div>
                    <label class="block mb-2 font-medium text-gray-900">Prioridad *</label>
                    <select name="prioridad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
                        <option value="baja" {{ old('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                        <option value="media" {{ old('prioridad', 'media') == 'media' ? 'selected' : '' }}>Media</option>
                        <option value="alta" {{ old('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                        <option value="urgente" {{ old('prioridad') == 'urgente' ? 'selected' : '' }}>Urgente</option>
                    </select>
                </div>
                
                <!-- Estado -->
                <div>
                    <label class="block mb-2 font-medium text-gray-900">Estado</label>
                    <select name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="diagnostico" {{ old('estado') == 'diagnostico' ? 'selected' : '' }}>En Diagnóstico</option>
                        <option value="espera" {{ old('estado') == 'espera' ? 'selected' : '' }}>En Espera</option>
                    </select>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Método Pago -->
                <div>
                    <label class="block mb-2 font-medium text-gray-900">Método de Pago</label>
                    <select name="metodo_pago" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="efectivo" {{ old('metodo_pago') == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                        <option value="tarjeta" {{ old('metodo_pago') == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                        <option value="transferencia" {{ old('metodo_pago') == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                        <option value="pendiente" {{ old('metodo_pago') == 'pendiente' ? 'selected' : '' }}>Por Definir</option>
                    </select>
                </div>
                
                <!-- Total -->
                <div>
                    <label class="block mb-2 font-medium text-gray-900">Total *</label>
                    <input type="number" name="total" step="0.01" 
                           value="{{ old('total') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                           required>
                </div>
            </div>
            
            <!-- Botones -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="/tickets" class="px-5 py-2.5 text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Cancelar
                </a>
                <button type="submit" class="px-5 py-2.5 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Guardar Ticket
                </button>
            </div>
        </form>
    </div>
</div>
@endsection