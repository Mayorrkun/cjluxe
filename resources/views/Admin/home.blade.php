@props(['products', 'orders', 'users'])
<x-admin.layout>

    <section class="px-4 md:px-[50px]" style="font-family: MTNBrighterSans-Regular">
        {{-- Best Sellers --}}
        <div>
            <h1 class="text-[20px] md:text-[25px] font-[600] my-[20px] block border-b border-b-gray-300">Your Best Sellers</h1>
            <div class="swiper swiper-Marquee h-[150px]">
                <div class="swiper-wrapper" style="transition-timing-function: linear !important;">
                    @if($products->where('quantity', '<', 15)->isEmpty())
                        <p class="text-blue-500 w-full text-center mt-[50px] text-base md:text-lg font-bold">Nothing yet sorry ...</p>
                    @else
                        @foreach($products->where('quantity', '<', 15) as $product)
                            <a href="{{route('admin.product',['product'=>$product->id])}}" class="swiper-slide h-[100px] w-[100px] sm:w-[120px] rounded-md shadow-xl p-[10px] flex items-center justify-center">
                                <img src="{{url($product->images->first()->img_src)}}" alt="" class="h-full object-contain">
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        ```
        {{-- Recent Orders --}}
        <div>
            <h1 class="text-[20px] md:text-[25px] font-[600] my-[20px] block border-b border-b-gray-300">Recent Orders</h1>
            <div class="swiper swiper-Marquee h-[200px] md:h-[150px]">
                <div class="swiper-wrapper">
                    @if($orders->isEmpty())
                        <p class="text-blue-500 w-full text-center mt-[50px] text-base md:text-lg font-bold">No orders made yet ...</p>
                    @else
                        @foreach($orders as $order)
                            <a href="{{route('admin.order', ['order' => $order->id])}}" class="swiper-slide h-[140px] md:h-[100px] w-[150px] md:w-[100px] rounded-md shadow-xl p-[10px] bg-white">
                                <div class="w-full h-full flex flex-col justify-between">
                                    <h3 class="block text-sm md:text-base text-right font-[500] truncate">{{$order->recipient}}</h3>
                                    <p class="w-full text-xs md:text-sm">
                                        <span class="block text-red-600">Status: {{$order->status}}</span>
                                        <span class="block">Items: {{$order->orderitems()->count()}}</span>
                                        <span class="block font-[600] mt-2 md:mt-[30px] text-sm md:text-base">₦{{$order->total}}</span>
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        ```

    </section>

</x-admin.layout>
