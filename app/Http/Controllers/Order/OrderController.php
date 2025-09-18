<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

    public function userOrders(){
        $orders = Auth::user()->orders()->get();

        return view('orders.orders',['orders' => $orders]);
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



        //create order in with a state of pending
        $order = Orders::create([
            'user_id' => Auth::id(),
            'recipient' => $validated['recipient'],
            'total' => $total,
            'status' => 'pending',
            'address' => $validated['address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'phone' => $validated['phone'],
        ]);

        foreach($cart->cartitems as $cartItem){
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'discount' => $cartItem->discount,
                'size' => $cartItem->size,
            ]);
        }
        $reference = 'ORD-'.$order->id.'-'.uniqid();
        //initialize transaction
        $response = Http::withToken(config('services.paystack.secret'))
            ->post(config('services.paystack.base_url'). '/transaction/initialize', [
                 'email' => Auth::user()->email,
                 'amount' => $total*100, //in kobo
                 'reference' => $reference,
                 'callback_url' => config('services.paystack.callback'),
                 'metadata' => [
                     'order_id' => $order->id,
                 ]
            ]);

        // ✅ Log Paystack response for debugging
        \Log::info('Paystack initialize response', $response->json());


        if($response->failed() || !isset($response['data']['authorization_url'])){
            $order->update(['status' => 'failed']);
            return back()->with('error', 'Unable to initiate Payment');
        }

        $body = $response->json();
        if(!data_get($body, 'data.authorization_url')){
            //something wrong
            return back()->with('error', 'Payment gateway error');
        }
        //save reference to order
        $order->update(['reference' => $body['data']['reference']]);

        //redirect to payment_page
        return redirect()->away($body['data']['authorization_url']);


    }

    public function handleCallback(Request $request){

        $cart = Auth::user()->carts()->where('status', 'active')->first();

        $reference = $request->query('reference');

        $order = Auth()->user()->orders()->where('reference', $reference)->first();

        $verify_response = Http::withToken(config('services.paystack.secret'))
            ->get(config('services.paystack.base_url').'/transaction/verify/'.$reference);

        if($verify_response->failed()){
            dd('failed');
            //return redirect()->route('order.index')->with('error', 'Unable to verify Payment');
        }
        $body = $verify_response->json();
        if(data_get($body, 'data.status') !== 'success'){
            // Payment not successful
            Orders::where('reference', $body['data']['reference'])
                ->update(['status' => 'failed']);
            return redirect()->route('order.index')->with('error', 'Payment was not Successful');
        }

        $order->update(['status' => 'paid']);
        foreach ($cart->cartitems as $cartitems){
           $product =  Products::where('id', $cartitems->product_id)->first();
           $product->update(['quantity' =>$product->quantity - $cartitems->quantity]);
        }
        $cart->delete();

        return redirect()->route('order.main')->with('success', 'Payment was Successful');
    }
}
