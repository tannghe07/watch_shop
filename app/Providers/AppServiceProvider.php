<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
        \view()->composer('*', function ($view){
            if (Auth::check()){
                View::share([
                    'cart' => Cart::where('user_id', Auth::user()->id)->get(),
                    'issue' => Issue::where('status', 0)->get(),
                ]);
            }
        });
    }
}
