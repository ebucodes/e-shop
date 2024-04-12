<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }
    public function boot()
    {
        // Share categories data with all views
        view()->composer('*', function ($view) {
            $categories = Category::where('status', 'active')->get();
            $view->with('categories', $categories);
        });

        //
        Product::observe(ProductObserver::class);
    }
}