<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReceiptMail;
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
        $orders = Auth::user()->orders()->orderBy('created_at', 'DESC')->get();

        return view('orders.orders',['orders' => $orders]);
    }
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'recipient' => 'required|max:100',
            'phone' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            'state' => 'required|max:100|in:Lagos,Ogun,Oyo',
        ]);

        $delivery = $validated['state'];
        $cart = Auth::user()->carts()->first();

        if (!$cart || $cart->cartitems->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $total = 0;
        foreach ($cart->cartitems as $cartItem) {
            $total += $cartItem->price * $cartItem->quantity;
        }

        // Add flat delivery charge
        $total += 5000;

        $reference = 'ORD-' . uniqid();

        // Initialize Paystack transaction
        $response = Http::withToken(config('services.paystack.secret'))
            ->post(config('services.paystack.base_url') . '/transaction/initialize', [
                'email' => Auth::user()->email,
                'amount' => $total * 100, // in kobo
                'reference' => $reference,
                'callback_url' => config('services.paystack.callback'),
                'metadata' => [
                    'recipient' => $validated['recipient'],
                    'phone' => $validated['phone'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'total' => $total,
                    'cart_id' => $cart->id,
                    'user_id' => Auth::id(),
                ]
            ]);

        \Log::info('Paystack initialize response', $response->json());

        if ($response->failed() || !isset($response['data']['authorization_url'])) {
            return back()->with('error', 'Unable to initiate payment.');
        }

        $body = $response->json();

        if (!data_get($body, 'data.authorization_url')) {
            return back()->with('error', 'Payment gateway error.');
        }

        // Redirect user to Paystack payment page
        return redirect()->away($body['data']['authorization_url']);
    }


    public function handleCallback(Request $request)
    {
        $reference = $request->query('reference');

        // Verify payment with Paystack
        $verify_response = Http::withToken(config('services.paystack.secret'))
            ->get(config('services.paystack.base_url') . '/transaction/verify/' . $reference);

        if ($verify_response->failed()) {
            return redirect()->route('order.index')->with('error', 'Unable to verify payment.');
        }

        $body = $verify_response->json();
        $status = data_get($body, 'data.status');

        if ($status !== 'success') {
            return redirect()->route('order.index')->with('error', 'Payment was not successful.');
        }

        // Extract metadata (we use this to recreate the order)
        $metadata = data_get($body, 'data.metadata');

        // Ensure metadata exists
        if (!$metadata || !isset($metadata['cart_id'])) {
            return redirect()->route('order.index')->with('error', 'Invalid transaction data.');
        }

        $user = User::find($metadata['user_id']);
        $cart = $user->carts()->where('id', $metadata['cart_id'])->first();

        if (!$cart) {
            return redirect()->route('order.index')->with('error', 'Cart not found.');
        }

        // Create order now that payment succeeded
        $order = Orders::create([
            'user_id' => $user->id,
            'recipient' => $metadata['recipient'],
            'phone' => $metadata['phone'],
            'address' => $metadata['address'],
            'city' => $metadata['city'],
            'state' => $metadata['state'],
            'total' => $metadata['total'],
            'status' => 'paid',
            'reference' => $reference,
        ]);

        // Create order items from cart items
        foreach ($cart->cartitems as $cartItem) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'discount' => $cartItem->discount,
                'size' => $cartItem->size,
            ]);

            // Update product quantities
            $product = Products::find($cartItem->product_id);
            if ($product) {
                $product->decrement('quantity', $cartItem->quantity);
                if ($product->quantity < 1) {
                    $product->update(['sold_out' => true]);
                }
            }
        }

        // Optional: send receipt email
        // Mail::to($user->email)->send(new OrderReceiptMail($order));

        // Delete the cart after order completion
        $cart->delete();

        return redirect()->route('order.main')->with('success', 'Payment was successful and your order has been placed.');
    }

    public function receipt(Orders $order)
    {
        $pdf = Pdf::loadView('orders.receipt', compact('order'));
        return $pdf->download('receipt-'.$order->reference.'.pdf');
    }
}
