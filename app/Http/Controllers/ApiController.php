<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    // se busca por el ip del usuario
    public function getLocation(Request $request)
    {
        try {
            $response = Http::get(config('services.ipapi.url'), [
                'fields' => 'status,message,country,countryCode,regionName,city,lat,lon,timezone,currency,query'
            ]);
            
            $data = $response->json();
            
            if ($data['status'] === 'success') {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'ip' => $data['query'],
                        'country' => $data['country'],
                        'country_code' => $data['countryCode'],
                        'region' => $data['regionName'],
                        'city' => $data['city'],
                        'latitude' => $data['lat'],
                        'longitude' => $data['lon'],
                        'timezone' => $data['timezone'],
                        'currency' => $data['currency']
                    ]
                ]);
            }
            
            return response()->json(['success' => false, 'message' => 'No se pudo obtener la ubicación'], 400);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
    public function getWeather(Request $request)
    {
        $validated = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric'
        ]);
        
        try {
            $response = Http::get(config('services.openmeteo.url'), [
                'latitude' => $validated['lat'],
                'longitude' => $validated['lon'],
                'current_weather' => true,
                'temperature_unit' => 'celsius',
                'timezone' => 'auto'
            ]);
            
            $data = $response->json();
            
            if (isset($data['current_weather'])) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'temperature' => $data['current_weather']['temperature'],
                        'windspeed' => $data['current_weather']['windspeed'],
                        'weathercode' => $data['current_weather']['weathercode'],
                        'is_day' => $data['current_weather']['is_day'],
                        'time' => $data['current_weather']['time']
                    ]
                ]);
            }
            
            return response()->json(['success' => false, 'message' => 'Datos climáticos no disponibles'], 400);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
    public function getExchangeRate(Request $request)
    {
        try {
            // Obtener  dolares a pesos mexicanos
            $response = Http::get(config('services.frankfurter.url'), [
                'from' => 'USD',
                'to' => 'MXN'
            ]);
            
            $data = $response->json();
            
            if (isset($data['rates'])) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'base' => $data['base'],
                        'date' => $data['date'],
                        'rates' => $data['rates'],
                        'usd_to_mxn' => $data['rates']['MXN']
                    ]
                ]);
            }
            
            return response()->json(['success' => false, 'message' => 'Tipo de cambio no disponible'], 400);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
    //con todos los datos
    public function getAllData(Request $request)
    {
        $locationResponse = $this->getLocation($request);
        $locationData = json_decode($locationResponse->getContent(), true);
        
        if (!$locationData['success']) {
            return response()->json($locationData, 400);
        }
        
        $location = $locationData['data'];
        
        $weatherResponse = $this->getWeather(new Request([
            'lat' => $location['latitude'],
            'lon' => $location['longitude']
        ]));
        $weatherData = json_decode($weatherResponse->getContent(), true);
        
        $exchangeResponse = $this->getExchangeRate($request);
        $exchangeData = json_decode($exchangeResponse->getContent(), true);
        
        return response()->json([
            'success' => true,
            'data' => [
                'location' => $location,
                'weather' => $weatherData['success'] ? $weatherData['data'] : null,
                'exchange_rate' => $exchangeData['success'] ? $exchangeData['data'] : null
            ]
        ]);
    }
    
    public function getWeatherWithKey(Request $request)
    {
        $validated = $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric'
        ]);
        
        try {
            $response = Http::get(config('services.openweathermap.url'), [
                'lat' => $validated['lat'],
                'lon' => $validated['lon'],
                'appid' => config('services.openweathermap.key'),
                'units' => 'metric',
                'lang' => 'es'
            ]);
            
            $data = $response->json();
            
            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'temperature' => $data['main']['temp'],
                        'feels_like' => $data['main']['feels_like'],
                        'humidity' => $data['main']['humidity'],
                        'pressure' => $data['main']['pressure'],
                        'weather' => $data['weather'][0]['description'],
                        'icon' => $data['weather'][0]['icon'],
                        'wind_speed' => $data['wind']['speed'],
                        'city' => $data['name'],
                        'country' => $data['sys']['country']
                    ]
                ]);
            }
            
            return response()->json(['success' => false, 'message' => $data['message'] ?? 'Error'], 400);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}