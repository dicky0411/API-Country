<?php
namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function greeting(Request $request, $name = "")
    {
        return response()->json(['message' => "Hello $name"]);
    }
    
    public function show(Request $request, $code = null)
    {
        if (strlen($code)>10){
            return view('welcome', ['message' => "input too large"]);
        }
        $country = Country::where('code', $code)->first();
        if (!$country) {
            return view('welcome', ['message' => "Country not found"]);
        }
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
    public function showJson(Request $request, $code = null)
    {
        if (strlen($code)>10){
            return response()->json([
                "success" => false,
                "reason" => "Input is too long",  
            ]); 
        }
        $country = Country::where('code', $code)->first();
        if (!$country) {
            return response()->json([
                
                "success" => false,
                "reason" => "Country not found"
                
            ]);
        }
        return response()->json([
            "success" => true,
            'result'     => [
                'country' => $country->en,
                'code'    => $country->code,
                'tw'      => $country->tw,
                'locale'  => $country->locale,
                'zh'      => $country->zh,
                'lat'     => $country->lat,
                'lng'     => $country->lng,
                'emoji'   => $country->emoji,
    ]]);
    }

   

}
