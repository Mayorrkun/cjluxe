<!-- Overlay -->
@props(['cart'])
@php
    $total = 0;
@endphp
<div id="mobile-cart-overlay" class="fixed inset-0 bg-black/40 hidden"></div>


<div id="mobile-cart" class="fixed w-[100%] top-[50px] rounded-b-md shadow-xl px-[20px] transform translate-x-full transition-transform duration-300 z-[100] bg-white">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-[20px] leading-[25px] font-bold" style="font-family: MTNBrighterSans-Medium">Your Cart</h2>
        <button id="close-mobile-cart" class="text-gray-500 hover:text-gray-800">✕</button>
    </div>

    <div class="space-y-2 pb-[30px] ">
{{--        cart content--}}
        <div class="overflow-y-auto max-h-[400px]">
            @foreach($cart->cartitems as $cartItem)
                @php
                    $total = $total + ($cartItem->price * $cartItem->quantity)
                @endphp
                <div class="w-full flex gap-[20px] shadow-xl active-a border-b-[2px] my-[20px]">
                    <span class="w-[100px]"><img src="{{url($cartItem->product->images->first()->img_src)}}" alt=""></span>
                    <div class="w-full">
                        <p style="font-family: MTNBrighterSans-Regular" class="text-[14px] flex uppercase">{{$cartItem->product->product_name}} <span class="ml-auto"> {{$cartItem->size}}</span></p>
                        <p style="font-family: MTNBrighterSans-Regular" class="text-[16px] flex text-right justify-end"> <span>Quantity:</span> <span class="">{{$cartItem->quantity}}</span></p>
                    </div>
                    <a href="{{route('cart.remove',$cartItem->id)}}" class="text-[18px] px-[10px] flex items-center text-red-700">
                        <span style="font-family: MTNBrighterSans-Medium">X</span>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="flex "> <a href="{{route('cart.clear',$cart->id)}}" class="ml-auto text-white bg-red-600 py-[10px] px-[15px] rounded-md " style="font-family: MTNBrighterSans-Medium"> Clear Cart </a></div>
        <p style="font-family: MTNBrighterSans-Medium" class="text-[20px] flex">Total: <span class="ml-auto"> &#8358;{{number_format($total)}}</span></p>
        <button onclick="window.location.href ='{{route('order.index')}}'" style="font-family: MTNBrighterSans-Medium" class="mt-auto w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Checkout
        </button>
    </div>

</div>
