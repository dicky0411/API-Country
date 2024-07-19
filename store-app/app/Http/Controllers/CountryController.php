<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return response()->json(Country::all());
    }

    public function show($id)
    {
        $country = Country::find($id);
        if ($country) {
            return response()->json($country);
        }
        return response()->json(['message' => 'Country not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'integer|unique:countries',
            'tw' => 'string',
            'en' => 'string',
            'locale' => 'string',
            'zh' => 'string',
            'lat' => 'numeric',
            'lng' => 'numeric',
            'emoji' => 'string',
        ]);

        $country = Country::create($validated);
        return response()->json($country, 201);
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        $validated = $request->validate([
            'code' => 'integer|unique:countries',
            'tw' => 'string',
            'en' => 'string',
            'locale' => 'string',
            'zh' => 'string',
            'lat' => 'numeric',
            'lng' => 'numeric',
            'emoji' => 'string',
        ]);

        $country->update($validated);
        return response()->json($country);
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }

        $country->delete();
        return response()->json(['message' => 'Country deleted']);
    }
}
