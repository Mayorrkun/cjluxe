@props(['order'])
@php
    $delivery = '';
    if($order->is_delivered === 0){
        $delivery = 'Not Delivered';
    }
    else{
        $delivery = 'Delivered';
    }
@endphp
<x-admin.layout>
    <section class="flex flex-row gap-6 px-6 py-4" style="font-family: MTNBrighterSans-Regular">

        <!-- Order Items Carousel -->
        <div class="swiper swiper-OrderItems h-[220px] w-full max-w-[600px]">
            <div class="swiper-wrapper">
                @foreach($order->orderitems as $item)
                    <div class="swiper-slide flex flex-col items-center justify-center p-2 w-[200px]">
                        <img class="w-full h-[100px] object-contain"
                             src="{{ url($item->product->images->first()->img_src) }}"
                             alt="{{ $item->product->product_name }}">
                        <p class="mt-2 text-sm font-medium">{{ $item->product->product_name }}</p>
                        <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                        <p class="text-xs text-gray-600">₦{{ number_format($item->price, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Info -->
        <div class="bg-white shadow-md rounded-md p-4 w-full max-w-[600px]">
            <h2 class="text-lg font-semibold mb-4">Order Details</h2>
            <div class="grid grid-cols-2 gap-y-3">
                <span>Order ID</span>
                <span class="text-right">#{{ $order->id }}</span>

                <span>Recipient</span>
                <span class="text-right">{{ $order->recipient ?? 'Guest' }}</span>

                <span>Payment Status</span>
                <span class="text-right">{{ ucfirst($order->status ?? 'pending') }}</span>

                <span>Delivery Status</span>
                <span class="text-right">{{ ucfirst($delivery) }}</span>

                <span>Date</span>
                <span class="text-right">{{ $order->created_at->format('M d, Y H:i') }}</span>
            </div>
        </div>
    </section>
    <hr class="border-none h-[30px]">
    <section class="w-full px-6 grid grid-cols-2" style="font-family: MTNBrighterSans-Regular">
        <div>

        </div>
        <div class=" grid grid-cols-2 leading-[40px] ">
            @if($order->is_delivered === 0)
                <h1>Change Status to Delivered</h1>
                <a href="{{route('admin.order.delivered',['order' => $order->id])}}" class="font-bold text-white bg-green-500 text-center rounded-lg shadow-sm">Delivered</a>
            @endif

        </div>
    </section>
</x-admin.layout>
