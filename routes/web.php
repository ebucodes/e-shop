<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\UserRole;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', [WebsiteController::class, 'homePage'])->name('homePage');
Route::get('products/{category}', [WebsiteController::class, 'productsPage'])->name('productsPage');
Route::get('all-products', [WebsiteController::class, 'allProducts'])->name('allProducts');
Route::get('about-us', [WebsiteController::class, 'aboutUs'])->name('aboutUs');
Route::get('contact-us', [WebsiteController::class, 'contactUs'])->name('contactUs');
Route::get('faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('policy', [WebsiteController::class, 'policy'])->name('policy');



Route::get('my-logs', [WebsiteController::class, 'myLogs'])->name('myLogs');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');

//
Route::group(['prefix' => 'auth'], function () {
    Route::post('sign-in', [AuthController::class, 'signIn'])->name('signIn');
    Route::post('register', [AuthController::class, 'createUser'])->name('createUser');
    Route::get('log-out', [AuthController::class, 'logOut'])->name('logOut');
});

//
Route::group(['middleware' => ['auth', 'preventBackHistory']], function () {
    // admin
    Route::group(['middleware' => ['userRole:admin']], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
            Route::get('all-logs', [AdminController::class, 'allLogs'])->name('allLogs');
            // category
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', [AdminController::class, 'categoryIndex'])->name('categoryIndex');
                Route::post('store', [AdminController::class, 'categoryStore'])->name('categoryStore');
                Route::post('update', [AdminController::class, 'categoryUpdate'])->name('categoryUpdate');
                Route::post('delete', [AdminController::class, 'categoryDelete'])->name('categoryDelete');
            });
            // sub-category
            Route::group(['prefix' => 'sub-category'], function () {
                Route::get('/', [AdminController::class, 'subCategoryIndex'])->name('subCategoryIndex');
                Route::post('store', [AdminController::class, 'subCategoryStore'])->name('subCategoryStore');
                Route::post('update', [AdminController::class, 'subCategoryUpdate'])->name('subCategoryUpdate');
                Route::post('delete', [AdminController::class, 'subCategoryDelete'])->name('subCategoryDelete');
            });
        });
    });

    // seller
    Route::group(['middleware' => ['userRole:seller']], function () {
        Route::group(['prefix' => 'seller'], function () {
            Route::get('dashboard', [SellerController::class, 'dashboard'])->name('sellerDashboard');
            Route::get('profile', [SellerController::class, 'profile'])->name('sellerProfile');
            Route::post('save-profile', [SellerController::class, 'saveProfile'])->name('sellerSaveProfile');
            // sub-category
            Route::group(['prefix' => 'product'], function () {
                Route::get('', [SellerController::class, 'productIndex'])->name('productIndex');
                Route::get('create', [SellerController::class, 'productCreate'])->name('productCreate');
                Route::post('store', [SellerController::class, 'productStore'])->name('productStore');
                Route::post('update', [SellerController::class, 'productUpdate'])->name('productUpdate');
                Route::post('update-image', [SellerController::class, 'productUpdateImage'])->name('productUpdateImage');
                Route::post('delete', [SellerController::class, 'productDelete'])->name('productDelete');
            });
            // order history
            Route::group(['prefix' => 'orders'], function () {
                Route::get('history', [SellerController::class, 'orderHistory'])->name('orderHistory');
                Route::post('edit', [SellerController::class, 'editOrder'])->name('editOrder');
            });
        });
    });

    // buyer
    Route::group(['middleware' => ['userRole:buyer']], function () {
        Route::group(['prefix' => 'buyer'], function () {
            // Route::get('dashboard', [BuyerController::class, 'dashboard'])->name('sellerDashboard');
            // cart
            Route::group(['prefix' => 'cart'], function () {
                Route::get('all-items', [BuyerController::class, 'myCart'])->name('myCart');
                Route::post('add', [BuyerController::class, 'addToCart'])->name('addToCart');
                Route::post('update', [BuyerController::class, 'updateCart'])->name('updateCart');
            });
            // cart
            Route::group(['prefix' => 'checkout'], function () {
                Route::get('', [BuyerController::class, 'checkOut'])->name('checkOut');
                Route::post('place-order', [BuyerController::class, 'storeOrder'])->name('storeOrder');
            });
            // orders

            Route::group(['prefix' => 'orders'], function () {
                Route::get('history', [BuyerController::class, 'myOrder'])->name('myOrder');
            });
        });
    });
});