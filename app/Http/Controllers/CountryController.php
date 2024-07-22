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
        // If no code is provided, check if it's in the query parameters
        if (is_null($code)) {
            $code = $request->input('code');
        }

        // Validate the length of the input
        if (strlen($code) > 10) {
            $response = [
                'resultcode' => '101',
                'reason'     => 'Input is too long.',
                'result'     => null,
                'error_code' => 10001,
            ];

            // Log the response to a JSON file
            $this->logToJsonFile($request, $response);

            return view('welcome', ['message' => $response['reason']]);
        }

        // Find the country by code
        $country = Country::where('code', $code)->first();

        // Prepare response data
        if (!$country) {
            $response = [
                'resultcode' => '102',
                'reason'     => 'Country not found',
                'result'     => null,
                'error_code' => 10002,
            ];

            // Log the response to a JSON file
            $this->logToJsonFile($request, $response);

            return view('welcome', ['message' => $response['reason']]);
        }

        // Successful response data
        $response = [
            'resultcode' => '200',
            'reason'     => 'Success',
            'result'     => [
                'country' => $country->en,
                'code'    => $country->code,
                'tw'      => $country->tw,
                'locale'  => $country->locale,
                'zh'      => $country->zh,
                'lat'     => $country->lat,
                'lng'     => $country->lng,
                'emoji'   => $country->emoji,
            ],
            'error_code' => null,
        ];

        // Log the response to a JSON file
        $this->logToJsonFile($request, $response);

        // Return view with country information
        return view('welcome', [
            'country' => $country->en,
            'code'    => $country->code,
            'tw'      => $country->tw,
            'locale'  => $country->locale,
            'zh'      => $country->zh,
            'lat'     => $country->lat,
            'lng'     => $country->lng,
            'emoji'   => $country->emoji,
        ]);
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
