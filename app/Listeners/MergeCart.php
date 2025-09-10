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

        //Guest token from session
        $guest_token = Session::get('guest_token');

        if(!$guest_token){
            return;
        }
        //check if a session(guest) cart exists
        $guest_cart = Carts::where('guest_token', $guest_token)
            ->where('status', 'active')
            ->with('cartitems')
            ->first();

        if(!$guest_cart){
            logger('No Guest cart fired');
            return;
        }
        // find user cart

        $user_cart = Carts::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'active'],
            ['session_id' => null, 'guest_token' => null]
        );
        logger('user cart found');
        //The Reunion
        foreach($guest_cart->cartitems as $guest_item){
            logger('The reunion');

            $existing_item = $user->carts->cartitems
                ->where('cart_id', $user_cart->id)
                ->where('product_id', $guest_item->product_id)
                ->where('size', $guest_item->size)
                ->first();

            if($existing_item){
                logger('quantity updated');
                $existing_item->increment('quantity', $guest_item->quantity);
            }
            else{
                logger('The reunion fired');
               $guest_item->update([
                   'cart_id' => $user_cart->id,
               ]);
            }
        }

        //cleanup
        $guest_cart->delete();
        Session::forget('guest_token');
    }
}
