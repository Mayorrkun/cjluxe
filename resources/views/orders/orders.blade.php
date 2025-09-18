@props(['orders'])
<x-layout>
    @if($orders->isEmpty())
        <section class="px-4 py-6 text-center text-gray-600">
            You haven’t made any orders
        </section>
    @else
        <section class="h-auto md:h-[500px] overflow-y-auto px-4 md:px-[50px] py-4">
            @foreach($orders as $order)
                <div class="w-full my-4 shadow-xl p-4 bg-white text-[14px] rounded-md" style="font-family: MTNBrighterSans-Regular">
                    <!-- Order Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 text-sm md:text-base">
                        <span class="font-medium">Status: <span class="text-blue-700">{{$order->status}}</span></span>
                        <span>Date: {{$order->created_at}}</span>
                        <span>Total: &#8358;{{number_format($order->total)}}</span>
                    </div>

                    <!-- Order Details -->
                    <h1 class="text-[18px] md:text-[20px] border-b font-[600] my-3">Order Details</h1>
                    <div class="flex flex-row w-full px-2 py-2 gap-4 overflow-x-auto">
                        @foreach($order->orderitems as $items)
                            <div class="min-w-[80px] md:w-[100px] border-transparent border border-r-blue-500 border-b-blue-500 shadow-lg rounded-md overflow-hidden">
                                <img class="w-full h-[80px] md:h-[100px] object-contain"
                                     src="{{url($items->product->images->first()->img_src)}}"
                                     alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    @endif
</x-layout>
