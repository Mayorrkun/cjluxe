<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Products;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Support\Facades\View;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer(['Admin.*'], function ($view) {
            $products = Products::all();
            $orders   = Orders::all();
            $users    = User::role('user')->get();

            $view->with([
                'products' => $products,
                'orders'   => $orders,
                'users'    => $users,
            ]);
        });

    }
}
