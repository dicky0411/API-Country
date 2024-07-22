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

    /**
     * Log request and response data to a JSON file.
     *
     * @param Request $request
     * @param array $response
     */
    protected function logToJsonFile(Request $request, array $response)
    {
        // Define file path within Laravel's storage directory
        $filePath = storage_path('/Users/richardli/Documents/GitHub/API-Country/updateData.json');

        // Create log data
        $logData = [
            'request'   => [
                'method' => $request->method(),
                'url'    => $request->url(),
                'params' => $request->all(),
            ],
            'response'  => $response,
            'timestamp' => now()->toDateTimeString(),
        ];

        // Read existing log data
        if (file_exists($filePath)) {
            $existingLogs = json_decode(file_get_contents($filePath), true);
        } else {
            $existingLogs = [];
        }

        // Append new log data
        $existingLogs[] = $logData;

        // Ensure the directory exists
        $directory = dirname($filePath);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true); // Create directory if it doesn't exist
        }

        // Write updated log data to file
        file_put_contents($filePath, json_encode($existingLogs, JSON_PRETTY_PRINT));
    }

}
