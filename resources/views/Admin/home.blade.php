@props(['products', 'orders', 'users'])
<x-admin.layout>

<section class="px-[50px]" style="font-family: MTNBrighterSans-Regular">
{{--    best sellers--}}
    <div>
        <h1 class="text-[25px] font-[600] my-[20px] block border-b border-b-gray-300">Your Best Sellers</h1>
        <div class="swiper swiper-Marquee h-[150px]">
            <div class="swiper-wrapper" style="transition-timing-function: linear !important; ">
                @if($products->where('quantity', '<', 100)->isEmpty())
                    <p class="text-blue-500 w-full text-center mt-[50px] text-lg font-bold">Nothing yet sorry ...</p>
                @else
                    @foreach($products->where('quantity', '<', 100) as $product)
                        <a href="{{route('admin.product',['product'=>$product->id])}}" class="swiper-slide h-[100px] rounded-md shadow-xl p-[10px]">
                    <span class="w-full flex items-center">
                         <img src="{{url($product->images->first()->img_src)}}" alt="" class="h-full">
                    </span>

                        </a>
                    @endforeach
                @endif

            </div>

        </div>

    </div>

{{--    //recent orders div--}}
    <div>
        <h1 class="text-[25px] font-[600] my-[20px] block border-b border-b-gray-300">Recent Orders</h1>
        <div class="swiper swiper-Marquee h-[150px]">

            <div class="swiper-wrapper">
                @if($orders->isEmpty())
                    <p class="text-blue-500 w-full text-center mt-[50px] text-lg font-bold">No orders made yet ...</p>
                @else
                    @foreach($orders as $order)
                        <a href="{{route('admin.order', ['order' => $order->id])}}" class="swiper-slide h-[100px] w-[100px] rounded-md shadow-xl p-[10px]">
                    <div class="w-full">
                        <h3 class="block text-right font-[500]">{{$order->recipient}}</h3>
                        <p class="w-full">
                            <span class="block text-red-600 text-sm">Status:{{$order->status}}</span>
                            <span class="block">Items Quantity:{{$order->orderitems()->count()}}</span>

                            <span class="block font-[600] mt-[30px]">Total: {{$order->total}}</span>
                        </p>
                    </div>

                        </a>
                    @endforeach
                @endif

            </div>

        </div>

    </div>
</section>
</x-admin.layout>
