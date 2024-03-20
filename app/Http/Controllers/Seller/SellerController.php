<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SellerController extends Controller
{

    //
    public function dashboard()
    {
        $pageTitle = 'Seller Dashboard';
        $logs = Activity::orderBy('created_at', 'DESC')->get();


        return view('seller.dashboard', compact('pageTitle', 'logs'));
    }

    //
    public function profile(Request $request)
    {
        $pageTitle = 'Seller Profile';

        // $ip = $request->ip();
        // $response = Http::get('http://www.geoplugin.net/json.gp');
        // $location = $response->json();
        // if ($location['geoplugin_countryName'] == 'United States') {
        //     // Handle access denial
        //     dd('United States');
        // } elseif ($location['geoplugin_countryName'] == 'Nigeria') {
        //     dd('Nigeria');
        // }
        return view('seller.profile', compact('pageTitle'));
    }
}