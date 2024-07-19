<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    public function run(){
        // Path to the JSON file in the storage
        $jsonFilePath = storage_path('app/countryData.json');

        echo "Seeding countries from " . $jsonFilePath . PHP_EOL;

        // Read the JSON file
        $json = file_get_contents($jsonFilePath);

        // Check if the JSON is valid
        if ($json === false) {
            echo "Failed to read JSON file " . $jsonFilePath . PHP_EOL;
            return;
        }

        // Decode JSON into an associative array
        $data = json_decode($json, true);

        if ($data === null) {
            echo "Failed to decode JSON file " . $jsonFilePath . PHP_EOL;
            return;
        }

        // Insert data into the database
        foreach ($data as $item) {
            echo "Seeding country " . $item['code'] . PHP_EOL;

            DB::table('countries')->updateOrInsert(
                ['code' => $item['code']], // Unique identifier
                $item
            );
        }
    }
}
