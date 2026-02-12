<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APIs de Geolocalización</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .flag-icon {
            width: 50px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .weather-icon {
            font-size: 3rem;
            color: #4a90e2;
        }
        .currency-value {
            font-size: 2rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">
            <i class="fas fa-globe-americas"></i> APIs
        </h1>
        
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4><i class="fas fa-map-marker-alt"></i> Información de Geolocalización</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" id="location-data">
                            <div class="col-md-6">
                                <p><strong>IP:</strong> <span id="ip">Cargando...</span></p>
                                <p><strong>País:</strong> <span id="country">Cargando...</span></p>
                                <p><strong>Ciudad:</strong> <span id="city">Cargando...</span></p>
                                <p><strong>Región:</strong> <span id="region">Cargando...</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Latitud:</strong> <span id="latitude">Cargando...</span></p>
                                <p><strong>Longitud:</strong> <span id="longitude">Cargando...</span></p>
                                <p><strong>Zona Horaria:</strong> <span id="timezone">Cargando...</span></p>
                                <p><strong>Moneda:</strong> <span id="currency">Cargando...</span></p>
                                <div id="flag-container">
                                    <img id="flag" class="flag-icon" src="" alt="Bandera">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-info text-white">
                        <h4><i class="fas fa-cloud-sun"></i> Datos del Clima</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="weather-data">
                            <div class="weather-icon mb-3">
                                <i class="fas fa-sun"></i>
                            </div>
                            <p><strong>Temperatura:</strong> <span id="temperature">Cargando...</span> °C</p>
                            <p><strong>Velocidad del Viento:</strong> <span id="windspeed">Cargando...</span> km/h</p>
                            <p><strong>Condición:</strong> <span id="weather-condition">Cargando...</span></p>
                            <p><strong>Hora:</strong> <span id="weather-time">Cargando...</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white">
                        <h4><i class="fas fa-money-bill-wave"></i> Tipo de Cambio</h4>
                    </div>
                    <div class="card-body text-center">
                        <div id="exchange-data">
                            <div class="currency-value mb-3" id="exchange-rate">
                                $0.00
                            </div>
                            <p><strong>USD a MXN</strong></p>
                            <p><strong>Fecha:</strong> <span id="exchange-date">Cargando...</span></p>
                            <p><strong>Tasa Base:</strong> <span id="base-currency">Cargando...</span></p>
                            <div class="mt-3">
                                <i class="fas fa-chart-line fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4><i class="fas fa-code"></i> Datos JSON de la API</h4>
                    </div>
                    <div class="card-body">
                        <pre id="json-data" style="max-height: 300px; overflow-y: auto;">Cargando datos de la API...</pre>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <button id="refresh-btn" class="btn btn-primary btn-lg">
                    <i class="fas fa-sync-alt"></i> Actualizar Datos
                </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // para la bandera
            function getFlagUrl(countryCode) {
                return `https://flagcdn.com/w320/${countryCode.toLowerCase()}.png`;
            }
            
            // actualizar
            function updateAllData() {
                $.ajax({
                    url: '/api/all-data',
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            const data = response.data;
                            
                            // ubicacion
                            $('#ip').text(data.location.ip);
                            $('#country').text(data.location.country);
                            $('#city').text(data.location.city);
                            $('#region').text(data.location.region);
                            $('#latitude').text(data.location.latitude);
                            $('#longitude').text(data.location.longitude);
                            $('#timezone').text(data.location.timezone);
                            $('#currency').text(data.location.currency);
                            
                            // bandera
                            $('#flag').attr('src', getFlagUrl(data.location.country_code));
                            
                            // clima
                            if (data.weather) {
                                $('#temperature').text(data.weather.temperature + ' °C');
                                $('#windspeed').text(data.weather.windspeed + ' km/h');
                                $('#weather-time').text(new Date(data.weather.time).toLocaleString());
                                
                                // icono por clima
                                const weatherIcon = $('.weather-icon i');
                                const weatherCondition = $('#weather-condition');
                                const weatherCode = data.weather.weathercode;
                                const isDay = data.weather.is_day;
                                
                                if (weatherCode === 0) {
                                    weatherIcon.removeClass().addClass('fas fa-sun');
                                    weatherCondition.text('Despejado');
                                } else if (weatherCode <= 3) {
                                    weatherIcon.removeClass().addClass('fas fa-cloud-sun');
                                    weatherCondition.text('Parcialmente nublado');
                                } else if (weatherCode <= 48) {
                                    weatherIcon.removeClass().addClass('fas fa-smog');
                                    weatherCondition.text('Niebla');
                                } else if (weatherCode <= 67 || weatherCode <= 77) {
                                    weatherIcon.removeClass().addClass('fas fa-cloud-rain');
                                    weatherCondition.text('Lluvia');
                                } else if (weatherCode <= 99) {
                                    weatherIcon.removeClass().addClass('fas fa-bolt');
                                    weatherCondition.text('Tormenta');
                                }
                            }
                            
                            // el ca,bio de moneda
                            if (data.exchange_rate) {
                                const rate = data.exchange_rate.usd_to_mxn;
                                $('#exchange-rate').text('$' + rate.toFixed(2) + ' MXN');
                                $('#exchange-date').text(data.exchange_rate.date);
                                $('#base-currency').text(data.exchange_rate.base);
                            }
                            
                            // aqui puse el json
                            $('#json-data').text(JSON.stringify(response, null, 2));
                        }
                    },
                    error: function(xhr) {
                        alert('Error al obtener los datos: ' + xhr.responseText);
                    }
                });
            }
            
            // datos con el inicio
            updateAllData();
            
            // actualizar con el boton
            $('#refresh-btn').click(function() {
                $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Actualizando...');
                
                updateAllData();
                
                setTimeout(() => {
                    $(this).prop('disabled', false).html('<i class="fas fa-sync-alt"></i> Actualizar Datos');
                }, 1000);
            });
            
            // se cambia cada 5 minutos
            setInterval(updateAllData, 300000);
        });
    </script>
</body>
</html>