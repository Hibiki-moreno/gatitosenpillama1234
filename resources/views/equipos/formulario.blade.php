@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            <i class="fas fa-laptop mr-2"></i>
            {{ isset($equipo) ? 'Editar Equipo' : 'Registrar Equipo' }}
        </h1>

        <form
            action="{{ isset($equipo) ? url('/equipos/'.$equipo->id) : url('/equipos') }}"
            method="POST"
            class="space-y-6"
        >
            @csrf
            @if(isset($equipo))
                @method('PUT')
            @endif

            <div>
                <label class="block mb-2 text-sm font-medium">Modelo *</label>
                <input type="text" name="modelo"
                       value="{{ $equipo->modelo ?? '' }}"
                       class="w-full p-2.5 border rounded-lg">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">Marca *</label>
                <input type="text" name="marca"
                       value="{{ $equipo->marca ?? '' }}"
                       class="w-full p-2.5 border rounded-lg">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">Año</label>
                <input type="number" name="ano"
                       value="{{ $equipo->ano ?? '' }}"
                       class="w-full p-2.5 border rounded-lg">
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">Condición Física *</label>
                <select name="condicion_fisica" class="w-full p-2.5 border rounded-lg">
                    <option value="">Seleccione</option>
                    @foreach(['excelente','buena','regular','mala','dañado'] as $condicion)
                        <option value="{{ $condicion }}"
                            {{ (isset($equipo) && $equipo->condicion_fisica == $condicion) ? 'selected' : '' }}>
                            {{ ucfirst($condicion) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">Color</label>
                <input type="text" name="color"
                       value="{{ $equipo->color ?? '' }}"
                       class="w-full p-2.5 border rounded-lg">
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="/equipos" class="px-5 py-2 border rounded-lg">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-5 py-2 bg-blue-700 text-white rounded-lg">
                    Guardar Equipo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
