<?php

namespace App\Listeners;

use App\Models\CartItems;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Carts;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MergeCart
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Authenticated $event): void
    {
        //
        logger('MergeCart fired');

        $user = $event->user;
        $session = Session('guest_cart_session_id');

        //check if a session(guest) cart exists
        $cart = Carts::where('session_id', $session)
            ->whereNull('user_id')
            ->first();


        if($cart){
            logger('Guest cart found: '.$cart->id);
            // if user already has a cart merge items

            $existing_cart = Carts::where('user_id', $user->id)
                ->where('status', 'active')
                ->first();

            if($existing_cart){
                foreach($cart->cartitems as $item){
                    $existing_item = $existing_cart->cartitems
                        ->where('product_id', $item->product_id)
                        ->first();

                    if($existing_item){
                        $existing_item->quantity = $existing_item->quantity + $item->quantity;
                    }
                    else{
                        CartItems::create([
                            'cart_id' => $existing_cart->id,
                            'product_id' => $item->product_id,
                            'quantity'   => $item->quantity,
                            'price'      => $item->price,   // snapshot price
                            'total'      => $item->quantity * $item->price,
                        ]);
                    }
                }
                // delete guest cart after the REUNION, it's not death it's a homecoming
                $cart->delete();
            }
            else{
                // just make a new cart bro lol
                $cart->update([
                    'session_id' => null,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
