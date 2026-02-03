@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-user-cog mr-2"></i> Reparadores
            </h1>
            <p class="text-gray-600">Lista de técnicos registrados</p>
        </div>
        <a href="/reparadores/crear" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Nuevo Reparador
        </a>
    </div>

    <!-- Tabla de reparadores -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nombre Completo</th>
                    <th class="px-6 py-3">Contacto</th>
                    <th class="px-6 py-3">Especialidad</th>
                    <th class="px-6 py-3">Experiencia</th>
                    <th class="px-6 py-3">Turno</th>
                    <th class="px-6 py-3">Estado</th>
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reparadores as $reparador)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $reparador->id }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">
                            {{ $reparador->nombres }} {{ $reparador->apellido_paterno }} 
                            {{ $reparador->apellido_materno ? ' ' . $reparador->apellido_materno : '' }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-900">{{ $reparador->correo }}</div>
                        <div class="text-gray-500 text-xs">{{ $reparador->celular }}</div>
                    </td>
<td class="px-6 py-4">
    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
        {{ $reparador->especialidad->nombre ?? 'Sin especialidad' }} 
    </span>
</td>
                    <td class="px-6 py-4">
                        @if($reparador->anios_experiencia > 0)
                            <span class="font-medium">{{ $reparador->anios_experiencia }} años</span>
                        @else
                            <span class="text-gray-400">Sin experiencia</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $turnoLabels = [
                                'matutino' => 'Matutino',
                                'vespertino' => 'Vespertino', 
                                'nocturno' => 'Nocturno',
                                'mixto' => 'Mixto'
                            ];
                        @endphp
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-gray-100 text-gray-800">
                            {{ $turnoLabels[$reparador->turno] ?? $reparador->turno }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $estadoColors = [
                                'activo' => 'bg-green-100 text-green-800',
                                'inactivo' => 'bg-red-100 text-red-800',
                                'vacaciones' => 'bg-yellow-100 text-yellow-800',
                                'licencia' => 'bg-blue-100 text-blue-800'
                            ];
                        @endphp
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded {{ $estadoColors[$reparador->estado] ?? 'bg-gray-100' }}">
                            {{ ucfirst($reparador->estado) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <!-- Editar -->
                            <a href="/reparadores/{{ $reparador->id }}/editar" 
                               class="text-yellow-600 hover:text-yellow-900"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <form action="/reparadores/{{ $reparador->id }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('¿Eliminar este reparador?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($reparadores->count() == 0)
    <div class="text-center py-12">
        <i class="fas fa-user-cog text-4xl text-gray-300 mb-3"></i>
        <p class="text-lg text-gray-700 mb-2">No hay reparadores registrados</p>
        <p class="text-gray-500 mb-4">Comienza agregando tu primer técnico</p>
        <a href="/reparadores/crear" 
           class="inline-flex items-center text-blue-600 hover:text-blue-800">
            <i class="fas fa-plus mr-1"></i> Registrar primer reparador
        </a>
    </div>
    @endif
</div>
@endsection