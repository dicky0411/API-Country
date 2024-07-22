<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show(Request $request, $code = null)
    {
        // If no code is provided, check if it's in the query parameters
        if (is_null($code)) {
            $code = $request->input('code');
        }

        // Validate the length of the input
        if (strlen($code) > 10) {
            return view('welcome', ['message' => 'Input is too long.']);
        }

        // Find the country by code
        $country = Country::where('code', $code)->first();

        // Check if country exists
        if (!$country) {
            return view('welcome', ['message' => 'Country not found']);
        }

        // Return view with country information
        return view('welcome', [
            'country' => $country->en,
            'code' => $country->code,
            'tw' => $country->tw,
            'locale' => $country->locale,
            'zh' => $country->zh,
            'lat' => $country->lat,
            'lng' => $country->lng,
            'emoji' => $country->emoji
        ]);
    }
}
