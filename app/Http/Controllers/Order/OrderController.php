<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index(){
        $user_cart = Carts::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();
        if($user_cart->cartitems->isNotEmpty()){
            return view('order.checkout',['cart' => $user_cart]);
        }
        else{
            return back()->with('failure','cart is empty');
        }

    }
}
