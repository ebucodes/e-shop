<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SellerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginForm()
    {
        $pageTitle = 'Login';
        return view('auth.login', compact('pageTitle'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        //
        $validated = $request->validate([
            'firstName' => 'bail|required',
            'lastName' => 'bail|required',
            'email' => 'bail|required|unique:users,email',
            'phone' => 'bail|required|numeric',
            'role' => 'bail|required'
        ]);

        if ($validated) {
            $create = new User();
            $create->firstName = $request->firstName;
            $create->lastName = $request->lastName;
            $create->email = $request->email;
            $create->phone = $request->phone;
            $create->password = Hash::make($request->password);
            $create->role = $request->role;
            $create->save();
            // log activity
            $logMessage = $request->email . " registered on eShop as a {$request->role}";
            logAction($request->email, 'Created an Account', $logMessage, $request->ip(), $request->userAgent());
            //
            return redirect()->route('login')->with('success', "User created successfully");
        } else {
            // If there are validation errors, you can return to the form with the errors
            return back()->withErrors($validated);
        }
    }

    //
    public function signIn(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = $request->only('email', 'password');
        $user = User::whereEmail($credentials['email'])->first();

        // Check if the user is not found
        if (!$user) {
            // User not found
            // log activity
            $logMessage = $request->email . " failed to log in because user does not exist";
            logAction($request->email, 'Failed Login', $logMessage, $request->ip(), $request->userAgent());
            // response message
            return redirect()->route('login')->with('error', 'User not found.');
        }

        Auth::attempt($credentials);
        if (auth()->user()) {
            // log activity
            $logMessage = $user->email . ' logged into the eShop';
            logAction($user->email, 'Logged In', $logMessage, $request->ip(), $request->userAgent());
            // if the user is super admin
            if (auth()->user()->role == 'admin') {
                return redirect()->route('adminDashboard')->with('success', "Welcome to the eShop, {$user->firstName}");
            }
            //  if user is seller
            if (auth()->user()->role == 'seller') {
                $sellerProfile = SellerProfile::where('userID', auth()->user()->id)->first();
                if ($sellerProfile == null) {
                    return redirect()->route('sellerProfile')->with('info', "You need to complete your seller profile to activate your eShop account");
                }
                return redirect()->route('sellerDashboard')->with('success', "Welcome to the eShop, {$user->firstName}");
            }
        } else {
            // Invalid credentials
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }

    //
    public function logOut(Request $request)
    {
        // log activity
        $logMessage = auth()->user()->email . ' logged out of the eShop';
        logAction(auth()->user()->email, 'Logged Out', $logMessage, $request->ip(), $request->userAgent());
        //
        Auth::logout();
        return redirect()->route('login')->with('success', "Goodbye");
    }
}
