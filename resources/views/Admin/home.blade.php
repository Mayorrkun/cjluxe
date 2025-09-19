@props(['products', 'orders', 'users'])
<x-admin.layout>
    <h1 class="block w-full text-right text-[20px] text-gray-500" style="font-family: MTNBrighterSans-Regular">Welcome Back {{Auth::user()->first_name}}</h1>
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
                        <div class="swiper-slide h-[100px] rounded-md shadow-xl p-[10px]">
                    <span class="w-full">
                         <img src="{{url($product->images->first()->img_src)}}" alt="" class="h-full">
                    </span>

                        </div>
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
                        <a class="swiper-slide h-[100px] rounded-md shadow-xl p-[10px]">
                    <span class="w-full">
                         testing
                    </span>

                        </a>
                    @endforeach
                @endif

            </div>

        </div>

    </div>
</section>
</x-admin.layout>
