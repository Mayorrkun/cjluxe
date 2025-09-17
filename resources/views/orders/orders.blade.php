@props(['orders'])
<x-layout>
@if($orders->isEmpty())
    <section>
        You havent made any orders
    </section>

    @else
    <section class="h-[500px] overflow-y-auto">
        @foreach($orders as $order)
            <div class="w-full my-[10px] shadow-xl py-[10px] bg-white text-[14px]" style="font-family: MTNBrighterSans-Regular">
                <p class=" w-[500px] grid-cols-2">
                    <span class="">Status:{{$order->status}}</span>
                    <span class="mx-[20px]">Date of Order: {{$order->created_at}}</span>
                    <span class="">Total:{{number_format($order->total)}}</span>
                </p>

                <h1 class="text-[20px] border-b font-[600] mb-[10px]">Order Details </h1>
                <div class="flex flex-row w-full px-[10px] py-[5px] gap-[50px] overflow-x-auto">
                    @foreach($order->orderitems as $items)
                        <p class="w-[100px] border-transparent overflow-x-auto border border-r-blue-500 border-b-blue-500 shadow-lg">
                            <img class="" src="{{url($items->product->images->first()->img_src)}}" alt="">
                        </p>
                    @endforeach
                </div>

            </div>
        @endforeach

    </section>
@endif
</x-layout>
