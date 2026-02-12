namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        Location::create([
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return response()->json(['ok' => true]);
    }
}
