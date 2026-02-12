<!DOCTYPE html>
<html>
<head>
    <title>Geolocalización</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body{
            font-family: Arial;
            background:#0f172a;
            color:white;
            text-align:center;
            padding-top:60px;
        }

        .card{
            background:#1e293b;
            padding:30px;
            border-radius:12px;
            width:350px;
            margin:auto;
        }

        button{
            padding:10px 20px;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>📍 Geolocalización</h2>

    <p>Lat: <span id="lat">-</span></p>
    <p>Lng: <span id="lng">-</span></p>
    <p id="status">Esperando permiso...</p>

    <button onclick="startTracking()">Iniciar rastreo</button>
</div>

<script>
let watchId = null;

function startTracking() {

    if(!navigator.geolocation){
        alert("Tu navegador no soporta GPS");
        return;
    }

    watchId = navigator.geolocation.watchPosition(position => {

        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        document.getElementById('lat').innerText = lat;
        document.getElementById('lng').innerText = lng;
        document.getElementById('status').innerText = "Enviando...";

        fetch('/api/location', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                lat: lat,
                lng: lng,
                device: 'mi-celular'
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('status').innerText = "Ubicación guardada ✔";
        });

    },
    error => {
        alert("Activa el GPS y da permisos");
    },
    {
        enableHighAccuracy: true,
        maximumAge: 0,
        timeout: 5000
    });
}
</script>

</body>
</html>
