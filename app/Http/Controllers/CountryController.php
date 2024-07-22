<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    public function show($code)
    {
        $country = Country::where('code', $code)->first();
        if (!$country) {
            return response()->json([
                'message' => 'Country not found'
            ], Response::HTTP_NOT_FOUND);
        }

        // Return view with country information
        return view('country', [
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
