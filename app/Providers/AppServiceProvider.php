<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Carts;
use Illuminate\Support\Facades\View;
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
        View::composer('components.navbar', function ($view) {
            $products = Products::paginate(10); // or whatever you need
            $cart = null;
            if (Auth::check()) {
                $cart = Carts::where('user_id', Auth::id())
                    ->with('cartItems.product')
                    ->first();
            }
            else{

                $cart = Carts::where('session_id',Session::id())
                    ->with('cartItems.product')
                    ->first();
            }

            $view->with([
                'products' => $products,
                'cart'     => $cart,
            ]);
        });
    }
}
