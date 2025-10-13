
@props(['order'])
@php
    $delivery = $order->is_delivered === 0 ? 'Not Delivered' : 'Delivered';
@endphp

<x-admin.layout>
    <section class="flex flex-col md:flex-row gap-6 px-6 py-4" style="font-family: MTNBrighterSans-Regular">

        <!-- Order Items Carousel -->
        <div class="swiper swiper-OrderItems h-[220px] w-full md:max-w-[600px] bg-white rounded-lg shadow-md p-4">
            <h2 class="text-lg font-semibold mb-3">Order Items</h2>
            <div class="swiper-wrapper">
                @foreach($order->orderitems as $item)
                    <div class="swiper-slide flex flex-col items-center justify-center p-3 w-[180px] bg-gray-50 rounded-lg shadow">
                        <img class="w-full h-[100px] object-contain"
                             src="{{ url($item->product->images->first()->img_src) }}"
                             alt="{{ $item->product->product_name }}">
                        <p class="mt-2 text-sm font-medium text-center">{{ $item->product->product_name }}</p>
                        <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                        <p class="text-xs font-semibold text-green-600">₦{{ number_format($item->price, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Info -->
        <div class="bg-white shadow-md rounded-lg p-6 w-full md:max-w-[600px]">
            <h2 class="text-lg font-semibold mb-4">Order Details</h2>
            <div class="grid grid-cols-2 gap-y-3 text-sm">
                <span class="font-medium">Order ID</span>
                <span class="text-right">#{{ $order->id }}</span>

                <span class="font-medium">Recipient</span>
                <span class="text-right">{{ $order->recipient ?? 'Guest' }}</span>

                <span class="font-medium">Payment Status</span>
                <span class="text-right">{{ ucfirst($order->status ?? 'pending') }}</span>

                <span class="font-medium">Delivery Status</span>
                <span class="text-right {{ $order->is_delivered ? 'text-green-600' : 'text-red-600' }}">
                    {{ $delivery }}
                </span>

                <span class="font-medium">Total</span>
                <span class="text-right">{{ number_format($order->total)}}</span>

                <span class="font-medium">Date</span>
                <span class="text-right">{{ $order->created_at->format('M d, Y H:i') }}</span>
            </div>
        </div>
    </section>

    <!-- Actions -->
    <section class="w-full px-6 py-6" style="font-family: MTNBrighterSans-Regular">
        <div class="flex justify-end items-center gap-4">
            @if($order->is_delivered === 0)
                <h1 class="text-sm font-medium">Change Status to Delivered</h1>
                <a href="{{ route('admin.order.delivered', ['order' => $order->id]) }}"
                   class="px-4 py-2 font-bold text-white bg-green-500 hover:bg-green-600 transition rounded-lg shadow-sm">
                    Mark as Delivered
                </a>
            @else
                <h1 class="text-sm font-medium">Change Status to Not Delivered</h1>
                <a href="{{ route('admin.order.delivered', ['order' => $order->id]) }}"
                   class="px-4 py-2 font-bold text-white bg-red-500 hover:bg-red-600 transition rounded-lg shadow-sm">
                    Mark as Not Delivered
                </a>
            @endif
        </div>
    </section>
</x-admin.layout>
