<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show($code)
    {
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
