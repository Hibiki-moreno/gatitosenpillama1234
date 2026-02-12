use App\Http\Controllers\Api\LocationController;

Route::post('/location', [LocationController::class, 'store']);
