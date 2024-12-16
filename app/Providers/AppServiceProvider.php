<?php

namespace App\Providers;

use App\Models\Restaurant;
use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Auth;


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
    public function boot(): void
    {
        // View::composer('*', function ($view) {
        //     if (Auth::check()) { // Ensure the seller is authenticated
        //         $sellerId = Auth::id();
        //         $restaurants = Restaurant::where('id', $sellerId)->get(['id', 'restaurant_name', 'logo', 'feature_image']);
        //         $view->with('restaurants', $restaurants);
        //     } else {
        //         $view->with('restaurants', null);
        //     }
        // });
    }
}
