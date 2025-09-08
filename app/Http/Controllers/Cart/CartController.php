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
            //Guest lol
            $session_id = Session::id();
            $cart = Carts::firstOrCreate([
               'user_id' => null,
               'session_id' => $session_id
            ]);
            $cart_item = CartItems::where(['product_id'=>$product->id,'size' => $size])->first();
            if($cart_item){
                $cart_item->update([
                    'quantity' =>  $cart_item->quantity + $validated['quantity'],
                ]);
                return redirect()->back()->with('success', 'product added to cart');
            }
            else{
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
        }
    }
    public function addToCart(Request $request, Products $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'size'     => 'required|in:M,L,XL',
        ]);
        $size = $validated['size'];

        if (!Auth::check()) {
            return redirect()->route('login.page');
        }

        // Get or create the user's cart
        $cart = Auth::user()->carts()->first();
        if (!$cart) {
            $cart = Carts::create([
                'user_id' => Auth::id(),
            ]);
        }

        // Check if the product with the same size already exists in the cart
        $cartItem = CartItems::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('size', $validated['size'])
            ->first();

        if ($cartItem) {
            // Update quantity if product already in cart
            $cartItem->update([
                'quantity' => $cartItem->quantity + $validated['quantity'],
            ]);
        } else {
            // Otherwise create new cart item
            CartItems::create([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'quantity'  => $validated['quantity'],
                'size'      => $size,
                'price'     => $product->price,
                'discount'  => $product->discount,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
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
    public function destroy(Carts $carts)
    {
        if($carts->cartitems){
            $carts->cartitems->delete();
            return redirect()->back()->with('success','cart empty');
        }
        else{
            return redirect()->back()->with('error', 'cart already empty');
        }
    }

}
