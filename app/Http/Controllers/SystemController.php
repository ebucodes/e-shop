<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    //
    public function importCountry(Request $request)
    {
        // Define the path to your CSV file
        $csvFilePath = base_path('/public/imports/files/countries1.csv');
        // $csvFilePath = base_path('imports\db\countries.csv');

        // Open the CSV file for reading
        $csvFile = fopen($csvFilePath, 'r');

        if (!$csvFile) {
            return redirect()->back()->with('error', "Failed to open CSV file");
        }

        // Skip the header row if your CSV file has one
        // If not, remove this line
        fgetcsv($csvFile);

        while (($data = fgetcsv($csvFile)) !== false) {
            // Assuming your CSV columns are in a specific order, adjust this part accordingly
            list($name, $iso2, $continent, $sub_region, $currency_code, $flag_emoji, $flag_emoji2, $phone_code) = $data;

            DB::table('countries')->insert([
                'name' => $name,
                'iso2' => $iso2,
                'continent' => $continent,
                'sub_region' => $sub_region,
                'currency_code' => $currency_code,
                'flag_emoji' => $flag_emoji,
                'flag_emoji2' => $flag_emoji2,
                'phone_code' => $phone_code,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        fclose($csvFile);

        return redirect()->route('login');
    }
}
