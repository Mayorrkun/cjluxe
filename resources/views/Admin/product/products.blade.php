@props(['categories','products'])
@php
use Jenssegers\Agent\Agent;
$agent = new Agent();
 @endphp
<x-admin.layout >
<section>

</section>
@foreach($categories as $category)
    <section>
        <h1 class="block font-bold w-full text-center text-[20px] text-blue-500 border-b border-b-gray-400 my-[20px]" style="font-family: MTNBrighterSans-Regular">{{$category->category_name}}</h1>
        @if($agent->isMobile())
            <div class=" grid grid-cols-3 gap-y-[10px]" style="font-family: MTNBrighterSans-Regular">
                @foreach($products->where('category_id',$category->id) as $product)
                    <a href="{{route('admin.product',['product'=>$product->id])}}" class="h-[150px] flex flex-col items-center">
                        <img src="{{url($product->images->first()->img_src)}}" alt="try again" class="h-[100px]">
                        <span class="block text-center">{{$product->product_name}}</span>
                    </a>
                @endforeach
            </div>
        @elseif($agent->isDesktop())
            <div class=" grid grid-cols-5 gap-y-[10px]" style="font-family: MTNBrighterSans-Regular">
                @foreach($products->where('category_id',$category->id) as $product)
                    <a href="{{route('admin.product',['product'=>$product->id])}}" class="h-[150px] flex flex-col items-center">
                        <img src="{{url($product->images->first()->img_src)}}" alt="try again" class="h-[100px]">
                        <span class="block text-center">{{$product->product_name}}</span>
                    </a>
                @endforeach
            </div>
        @endif

    </section>
@endforeach
</x-admin.layout>
