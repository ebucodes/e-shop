<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Exceptions\InvalidInputException;
use App\Models\Category;
use App\Models\Product;

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
        $profile = SellerProfile::where('userID', auth()->user()->id)->first();
        // $ip = $request->ip();
        // $response = Http::get('http://www.geoplugin.net/json.gp');
        // $location = $response->json();
        // if ($location['geoplugin_countryName'] == 'United States') {
        //     // Handle access denial
        //     dd('United States');
        // } elseif ($location['geoplugin_countryName'] == 'Nigeria') {
        //     dd('Nigeria');
        // }
        return view('seller.profile', compact('pageTitle', 'profile'));
    }

    //
    public function saveProfile(Request $request)
    {
        $userID = auth()->user()->id;
        $companyName = $request->companyName;
        $companyEmail = $request->companyEmail;
        $companyWebsite = $request->companyWebsite;
        $companyFacebook = $request->companyFacebook;
        $companyTwitter = $request->companyTwitter;
        $companyInstagram = $request->companyInstagram;
        $regNumber = $request->regNumber;
        $companyAddress = $request->companyAddress;
        $companyPhone = $request->companyPhone;
        $companyLocation = $request->companyLocation;
        $bankName = $request->bankName;
        $accountName = $request->accountName;
        $accountNumber = $request->accountNumber;
        $payStackID = $request->payStackID;
        $payPalID = $request->payPalID;
        $status = "active";
        $companyLogo = $request->companyLogo;
        $seller = SellerProfile::where('userID', auth()->user()->id)->first();
        //
        $validated = $request->validate([
            'companyName' => 'bail|required',
            'companyEmail' => 'bail|required|unique:seller_profiles,companyEmail',
            'regNumber' => 'bail|required|unique:seller_profiles,regNumber',
            'companyAddress' => 'bail|required',
            'companyPhone' => 'bail|required|numeric',
            'companyLogo' => 'bail|required|file',
            'companyLocation' => 'bail|required',
            'bankName' => 'bail|required',
            'accountName' => 'bail|required',
            'accountNumber' => 'bail|required',
            'payStackID' => 'bail|required',
            'payPalID' => 'bail|required'
        ]);
        //
        if ($validated) {
            //
            if ($seller != NULL) {
                $update = $seller->update(['companyName' => $companyName, 'companyEmail' => $companyEmail, 'companyWebsite' => $companyWebsite, 'companyFacebook' => $companyFacebook, 'companyTwitter' => $companyTwitter, 'companyInstagram' => $companyInstagram, 'regNumber' => $regNumber, 'companyAddress' => $companyAddress, 'companyPhone' => $companyPhone, 'companyLocation' => $companyLocation, 'bankName' => $bankName, 'accountName' => $accountName, 'accountNumber' => $accountNumber, 'payStackID' => $payStackID, 'paypalD' => $payPalID]);
                // log activity
                $logMessage = auth()->user()->email . " updated their seller profile on eShop ";
                logAction(auth()->user()->email, 'Updated Seller Profile', $logMessage, $request->ip(), $request->userAgent());
                return redirect()->back()->with('success', "Profile Update successfully");
            } else {
                $create = new SellerProfile();
                $create->userID = $userID;
                $create->companyName = $companyName;
                $create->companyEmail = $companyEmail;
                $create->companyWebsite = $companyWebsite;
                $create->companyFacebook = $companyFacebook;
                $create->companyTwitter = $companyTwitter;
                $create->companyInstagram = $companyInstagram;
                $create->regNumber = $regNumber;
                $create->companyAddress = $companyAddress;
                $create->companyPhone = $companyPhone;
                $create->companyLocation = $companyLocation;
                if ($companyLogo) {
                    $logo_name = 'seller-' . time() . random_int(1, 1000) . '.' . $companyLogo->getClientOriginalExtension();
                    $companyLogo->move('img/seller/', $logo_name);
                    $create->companyLogo = $logo_name;
                }
                $create->bankName = $bankName;
                $create->accountName = $accountName;
                $create->accountNumber = $accountNumber;
                $create->payStackID = $payStackID;
                $create->payPalID = $payPalID;
                $create->status = $status;
                $create->save();
                // log activity
                $logMessage = $request->email . " created a seller profile on eShop ";
                logAction($request->email, 'Created a Seller Profile', $logMessage, $request->ip(), $request->userAgent());
                return redirect()->back()->with('success', "Profile created successfully");
            }
        }
    }

    //
    public function productIndex()
    {
        $pageTitle = 'Products';
        $collection = Product::orderBy('created_at', 'DESC')->get();
        $categories = Category::where('status', 'active')->orderBy('created_at', 'DESC')->get();
        return view('seller.product', compact('pageTitle', 'collection', 'categories'));
    }

    //
    public function productCreate()
    {
        $pageTitle = 'Create a New Product';
        $collection = Product::orderBy('created_at', 'DESC')->get();
        $categories = Category::where('status', 'active')->orderBy('created_at', 'DESC')->get();
        return view('seller.createProduct', compact('pageTitle', 'collection', 'categories'));
    }

    //
    public function productStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',
            'category' => 'bail|required',
            'main_picture' => 'bail|required',
            // 'others_pictures' => 'bail|required',
            'price' => 'bail|required|numeric|min:0',
            'quantity' => 'bail|required|numeric|min:0',

        ]);

        if ($validated) {
            $create = new Product();
            $create->user_id = auth()->user()->email;
            $create->name = $request->name;
            $create->desc = $request->desc;
            $create->category = $request->category;
            $create->price = $request->price;
            $create->quantity = $request->quantity;
            $create->purchased = '0';
            $create->status = 'in_stock';
            $main = $request->main_picture;
            $other = $request->other_pictures;
            if ($main) {
                $main_name = $request->name . '-' . time() . random_int(1, 1000) . '.' . $main->getClientOriginalExtension();
                $main->move('products/', $main_name);
                $create->main_picture = $main_name;
            }

            // Store other pictures
            $otherPictures = [];
            if ($request->hasFile('other_pictures')) {
                foreach ($request->file('other_pictures') as $file) {
                    $filename = $request->name . '-' . time() . '-' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
                    $file->move('products/', $filename);
                    $otherPictures[] = $filename;
                    $create->other_pictures = $filename;
                }
            }

            $create->save();

            // log activity
            $logMessage = auth()->user()->email . " created a new product named: {$request->name}";
            logAction(auth()->user()->email, 'Created a Product', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->route('productIndex')->with('success', "Created successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
    }

    //
    public function productUpdate(Request $request)
    {
        $id = $request->id;
        $validated = $request->validate([
            'name' => 'bail|required',
            'desc' => 'bail|required',
            'category' => 'bail|required',
            'price' => 'bail|required|numeric|min:0',
            'quantity' => 'bail|required|numeric|min:0',
        ]);

        if ($validated) {
            $product = Product::where('id', $id)->first();

            $product->update(['name' => $request->name, 'desc' => $request->desc, 'category' => $request->category, 'price' => $request->price, 'quantity' => $request->quantity]);

            // log activity
            $logMessage = auth()->user()->email . " updated a  product";
            logAction(auth()->user()->email, 'Updated a Product', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->route('productIndex')->with('success', "Updated successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
    }


    // public function productUpdateImage(Request $request)
    // {
    //     $id = $request->id;
    //     $validated = $request->validate([
    //         'main_picture' => 'bail|required',
    //     ]);

    //     if ($validated) {
    //         $product = Product::where('id', $id)->first();
    //         if ($main) {
    //             $main_name = $request->name . '-' . time() . random_int(1, 1000) . '.' . $main->getClientOriginalExtension();
    //             $main->move('products/', $main_name);
    //             $create->main_picture = $main_name;
    //         }

    //         // Store other pictures
    //         $otherPictures = [];
    //         if ($request->hasFile('other_pictures')) {
    //             foreach ($request->file('other_pictures') as $file) {
    //                 $filename = $request->name . '-' . time() . '-' . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
    //                 $file->move('products/', $filename);
    //                 $otherPictures[] = $filename;
    //                 $create->other_pictures = $filename;
    //             }
    //         }

    //         $create->save();

    //         // log activity
    //         $logMessage = auth()->user()->email . " created a new product named: {$request->name}";
    //         logAction(auth()->user()->email, 'Created a Product', $logMessage, $request->ip(), $request->userAgent());
    //         //
    //         return redirect()->route('productIndex')->with('success', "Created successfully");
    //     } else {
    //         // If there are validation errors, you can return to the form with the errors
    //         return back()->withErrors($validated);
    //     }
    // }
}
