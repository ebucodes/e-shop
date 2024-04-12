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
        $pageTitle = "Home Page";
        $products = Product::orderBy('created_at', 'DESC')->paginate(6);
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('homePage', compact('pageTitle', 'products', 'categories'));
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

    public function allProducts()
    {
        $pageTitle = "All Products";
        $products = Product::orderBy('created_at', 'DESC')->paginate(6);
        $countProducts = $products->count();
        return view('pages.allProducts', compact('pageTitle', 'products', 'countProducts'));
    }

    //
    public function aboutUs()
    {
        $pageTitle = "About Us";
        return view('pages.aboutUs', compact('pageTitle'));
    }

    //
    public function contactUs()
    {
        $pageTitle = "Contact Us";
        return view('pages.contactUs', compact('pageTitle'));
    }

    //
    public function faq()
    {
        $pageTitle = "Frequently Ask Questions";
        return view('pages.faq', compact('pageTitle'));
    }

    //
    public function policy()
    {
        $pageTitle = "Policy";
        return view('pages.policy', compact('pageTitle'));
    }
}