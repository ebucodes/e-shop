<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Cart;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    //
    public function dashboard()
    {
        $pageTitle = 'Buyer Dashboard';
        $logs = Activity::orderBy('created_at', 'DESC')->get();
        return view('buyer.dashboard', compact('pageTitle', 'logs'));
    }

    //
    public function myCart()
    {
        $pageTitle = 'My Cart';
        $collection = Cart::where('userID', auth()->user()->email)->where('status', 'pending')->orderBy('created_at', 'DESC')->get();
        return view('buyer.cart', compact('pageTitle', 'collection'));
    }


    //
    public function addToCart(Request $request)
    {
        $productID = $request->product;
        $userID = $request->user;
        // Check if the item already exists in the cart for this user
        $existingCartItem = Cart::where('productID', $productID)
            ->where('userID', $userID)
            ->where('status', 'pending')
            ->first();

        if ($existingCartItem) {
            return redirect()->back()->with('info', 'This item is already in your cart.');
        }
        //
        $create = new Cart();
        $create->userID = $userID;
        $create->productID = $productID;
        $create->quantity = '1';
        $create->status = 'pending';
        $created = $create->save();
        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    //
    // public function updateCart(Request $request)
    // {
    //     $cartIDs = $request->cart;
    //     $quantities = $request->quantity;
    //     // Check if the item already exists in the cart for this user
    //     // $carts = Cart::where('id', $cartID)->get();

    //     foreach ($cartIDs as $key => $cartID) {
    //         $quantity = $quantities[$key];
    //         $cart = Cart::find($cartID);
    //         $cart->update(['quantity' => $quantity]);
    //     }

    //     // foreach ($carts as  $cart) {
    //     //     $cart->update(['quantity' => $quantity]);
    //     // }
    //     // $cart = Cart::find($cartID);
    //     return redirect()->route('checkOut')->with('success', 'Items updated to cart successfully');
    // }
    public function updateCart(Request $request)
    {
        $cartIDs = $request->cart;
        $quantities = $request->quantity;

        // Ensure $cartIDs and $quantities are arrays
        if (!is_array($cartIDs) || !is_array($quantities)) {
            // Handle the error, such as redirecting back with an error message
            return redirect()->back()->with('error', 'Invalid data received');
        }

        // Iterate through the arrays to update each item in the cart
        foreach ($cartIDs as $key => $cartID) {
            // Check if the key exists in the $quantities array
            if (array_key_exists($key, $quantities)) {
                $quantity = $quantities[$key];
                $cart = Cart::find($cartID);
                $cart->update(['quantity' => $quantity]);
            } else {
                // Handle the error if the key doesn't exist in $quantities
                return redirect()->back()->with('error', 'Invalid data received');
            }
        }

        return redirect()->route('checkOut')->with('success', 'Items updated to cart successfully');
    }


    //
    public function checkOut()
    {
        $pageTitle = 'Check Out';
        $collection = Cart::where('userID', auth()->user()->email)->where('status', 'pending')->orderBy('created_at', 'DESC')->get();
        return view('buyer.checkout', compact('pageTitle', 'collection'));
    }
}