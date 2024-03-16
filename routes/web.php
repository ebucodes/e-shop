<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebsiteController::class, 'home'])->name('homePage');
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
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');
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
})->middleware('auth', 'userType:admin', 'preventBackHistory');
