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
            return view('orders.checkout',['cart' => $user_cart]);
        }
        else{
            return back()->with('failure','cart is empty');
        }

    }
    public function store(Request $request){
        //initial segment
        $validated = $request->validate([
            'recipient' => 'required|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100|in:Lagos,Ogun,Oyo',
        ]);
        $cart = Auth::user()->carts()->first();
        $total = 0;
        foreach($cart->cartitems as $cartItem){
            $total += $cartItem->price * $cartItem->quantity;
        }
        $reference = 'ORD-';

        //create order in with a state of pending

        dd($total);


    }

    public function handleCallback(Request $request){

    }
}
