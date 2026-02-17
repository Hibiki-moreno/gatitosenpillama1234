use Illuminate\Support\Facades\Http;

public function buscarDireccion(Request $request)
{
    // Obtenemos la llave desde el archivo de configuración
    $key = config('services.locationiq.key');
    $query = $request->input('search');

    $response = Http::get("https://us1.locationiq.com/v1/search.php", [
        'key' => $key,
        'q' => $query,
        'format' => 'json',
    ]);

    // Esto te devuelve un array con latitud y longitud
    return $response->json();
}