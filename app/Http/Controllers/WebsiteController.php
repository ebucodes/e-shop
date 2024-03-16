<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function home()
    {
        return view('homePage');
    }

    public function myLogs()
    {
        $pageTitle = "My Logs";
        $collection = Activity::where('user', auth()->user()->email)->orderBy('created_at', 'DESC')->get();
        return view('my-logs', compact('pageTitle', 'collection'));
    }
}
