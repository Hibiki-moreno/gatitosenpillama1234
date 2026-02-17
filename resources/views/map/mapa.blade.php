@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    {{-- ENCABEZADO (Mismo estilo que tu lista de clientes) --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-map-marked-alt mr-2 text-blue-600"></i> Geolocalización de Servicios
            </h1>
            <p class="text-gray-600">Busca direcciones y visualiza coordenadas en tiempo real</p>
        </div>
        <div class="flex space-x-2">
            <input type="text" id="addressInput" 
                   placeholder="Ej: Av. Universidad, Guadalajara..." 
                   class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button onclick="buscarDireccion()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center transition">
                <i class="fas fa-search mr-2"></i> Buscar
            </button>
        </div>
    </div>

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        
        {{-- PANEL LATERAL DE INFO --}}
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                <h3 class="font-bold text-gray-700 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i> Detalles del Punto
                </h3>
                <div class="space-y-3">
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-bold">Latitud</label>
                        <p id="latDisplay" class="text-lg font-mono text-blue-700 font-bold">--</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-500 uppercase font-bold">Longitud</label>
                        <p id="lngDisplay" class="text-lg font-mono text-blue-700 font-bold">--</p>
                    </div>
                    <hr>
                    <div id="infoDireccion" class="text-sm text-gray-600 italic">
                        Realiza una búsqueda para ver la ubicación exacta.
                    </div>
                </div>
            </div>

            <button onclick="copiarCoordenadas()" class="w-full py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm transition font-medium">
                <i class="fas fa-copy mr-1"></i> Copiar Coordenadas
            </button>
        </div>

        {{-- MAPA --}}
        <div class="lg:col-span-3">
            <div id="map" class="rounded-xl shadow-inner border border-gray-200" style="height: 500px; z-index: 1;"></div>
        </div>
    </div>
</div>

{{-- LIBRERÍAS DE MAPAS (Leaflet) --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Inicialización del Mapa
    var map = L.map('map').setView([20.6597, -103.3496], 13); // Centro inicial (Guadalajara)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    function buscarDireccion() {
        const query = document.getElementById('addressInput').value;
        const token = "{{ config('services.locationiq.key') }}"; // Usa tu Access Token del .env

        if (!query) return alert("Por favor ingresa una dirección");

        // Llamada a LocationIQ
        fetch(`https://us1.locationiq.com/v1/search.php?key=${token}&q=${query}&format=json`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = data[0].lat;
                    const lon = data[0].lon;
                    const nombre = data[0].display_name;

                    // Actualizar Mapa
                    map.setView([lat, lon], 16);
                    
                    if (marker) map.removeLayer(marker);
                    marker = L.marker([lat, lon]).addTo(map)
                        .bindPopup(`<b class="text-blue-600">${nombre}</b>`)
                        .openPopup();

                    // Actualizar Textos
                    document.getElementById('latDisplay').innerText = lat;
                    document.getElementById('lngDisplay').innerText = lon;
                    document.getElementById('infoDireccion').innerText = nombre;
                } else {
                    alert("No se encontró ningún resultado.");
                }
            })
            .catch(err => {
                console.error(err);
                alert("Error al conectar con LocationIQ");
            });
    }

    function copiarCoordenadas() {
        const lat = document.getElementById('latDisplay').innerText;
        const lng = document.getElementById('lngDisplay').innerText;
        if(lat === "--") return;
        
        const coords = `${lat}, ${lng}`;
        navigator.clipboard.writeText(coords);
        alert("¡Copiado al portapapeles!: " + coords);
    }
</script>
@endsection