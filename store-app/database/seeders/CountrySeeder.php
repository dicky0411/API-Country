<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    public function run()
    {
        // Path to the JSON file in the storage
        $jsonFilePath = storage_path('app/countryData.json');

        // Read the JSON file
        $json = file_get_contents($jsonFilePath);

        // Decode JSON into an associative array
        $data = json_decode($json, true);

        // Insert data into the database
        foreach ($data as $item) {
            DB::table('countries')->updateOrInsert(
                ['code' => $item['code']], // Unique identifier
                $item
            );
        }
    }
}
