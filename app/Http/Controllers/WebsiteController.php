<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    //
    public function homePage()
    {
        return view('homePage');
    }

    public function myLogs()
    {
        $pageTitle = "My Logs";
        $collection = Activity::where('user', auth()->user()->email)->orderBy('created_at', 'DESC')->get();
        return view('my-logs', compact('pageTitle', 'collection'));
    }

    public function productsPage($category)
    {
        $categoryName = Category::where('id', $category)->first();
        $pageTitle = $categoryName->name;
        $products = Product::where('category', $category)->paginate(6);
        $countProducts = $products->count();
        return view('pages.products', compact('pageTitle', 'products', 'countProducts'));
    }
}