<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\BuyerProfile;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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
        $details = BuyerProfile::where('user', auth()->user()->email)->first();
        return view('buyer.checkout', compact('pageTitle', 'collection', 'details'));
    }

    //
    public function storeOrder(Request $request)
    {
        $buyer = auth()->user();
        $carts = Cart::with('product')->where('userID', $buyer->email)->get();
        $payment = $request->input('payment');
        // $sellers = $carts->product->user_id;
        // Generate a random 7-digit number
        $orderNumber = 'Order' . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
        $sellers = [];
        foreach ($carts as $cart) {
            // Assuming each cart has only one product
            $product = $cart->product;
            $seller = $product->user_id;
            $sellers[] = $seller;
            $price = ($cart->product->quantity) * ($cart->product->price);
            //
            $order = new Order();
            $order->orderID = $orderNumber;
            $order->buyer = $buyer->email;
            $order->seller = $seller;
            $order->product = $cart->product->id;
            $order->quantity = $cart->quantity;
            $order->price =  $cart->product->price;
            $order->payment = $payment;
            if ($payment == 'card') {
                $order->status = 'paid';
            }
            $create = $order->save();

            //
            if ($create) {
                //
                $products = Product::where('id', $cart->product->id)->first();

                $newQuantity = $products->quantity - $cart->quantity;
                $newPurchased = $products->purchased + $cart->quantity;
                $products->update(['quantity' => $newQuantity, 'purchased' => $newPurchased]);
                //
                $cartItems = Cart::where('userID', auth()->user()->email)->where('status', 'pending')->get();
                foreach ($cartItems as $cartItem) {
                    $cartItem->update(['status' => 'paid']);
                }
                // if ($request->payment == 'card') {
                //     $orders = Order::where('userID', auth()->user()->email)->where('status', 'pending')->get();
                //     foreach ($cartItems as $cartItem) {
                //         // $cart = Cart::find($cartID);
                //         $cartItem->update(['status' => 'paid']);
                //     }
                // }
            }
        }

        return redirect()->route('homePage')->with('success', 'Your order has been placed successfully');
        // dd($sellers);
    }

    //
    public function myOrder()
    {
        $pageTitle = 'Order History';
        $collection = Order::where('buyer', auth()->user()->email)->orderBy('created_at', 'DESC')->get();
        return view('buyer.orders', compact('pageTitle', 'collection'));
    }
}