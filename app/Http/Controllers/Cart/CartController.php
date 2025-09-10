<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\CartItems;
use App\Models\Carts;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    //
    public function store(Request $request, Products $product){
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'size'     => 'required|in:M,L,XL',
        ]);
        $size = $validated['size'];
        //user
        if(Auth::check()){
            $cart = Carts::firstOrCreate([
                'user_id' => Auth::id(),
                'session_id' => null,
            ]);
            CartItems::create([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'quantity'  => $validated['quantity'],
                'size'      => $size,
                'price'     => $product->price,
                'discount'  => $product->discount,
            ]);

            return redirect()->back()->with('success', 'product added to cart');
        }

        else {
            $guestToken = Session::get('guest_token'); // middleware guarantees this exists

            // ✅ always reuse the same guest cart
            $cart = Carts::firstOrCreate(
                ['guest_token' => $guestToken, 'status' => 'active'],
                ['user_id' => null, 'session_id' => Session::getId(),'guest_token' => $guestToken]
            );

            // ✅ make sure to check cart_id too
            $cart_item = CartItems::where([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'size'      => $size,
            ])->first();

            if ($cart_item) {
                $cart_item->increment('quantity', $validated['quantity']);
            } else {
                $cart->cartItems()->create([
                    'product_id'=> $product->id,
                    'quantity'  => $validated['quantity'],
                    'size'      => $size,
                    'price'     => $product->price,
                    'discount'  => $product->discount,
                ]);
            }

            return redirect()->back()->with('success', 'product added to cart');
        }

    }

    public function remove(CartItems $cartItem){

        if($cartItem){
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart!');
        }
        else{
            return redirect()->back()->with('error', 'Product not found in cart!');
        }
    }
    public function destroy(Carts $cart)
    {       foreach($cart->cartitems as $cartItem){
        $cartItem->delete();
    }
            return redirect()->back()->with('success','cart empty');

    }

}
