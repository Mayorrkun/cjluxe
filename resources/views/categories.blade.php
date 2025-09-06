@props([
    'categories'
])

<x-layout>
<x-navbar></x-navbar>
    <section class="md:px-[100px] md:py-[50px]">
        <div class=md:"mx-[85px]">
            @foreach($categories as $category)
                @php
                $align = '';
                if($category->id % 2 == 0){
                    $align = 'text-left';
                }
                else{
                    $align = 'text-right';
                }
                    @endphp
                <div class="my-[20px]">
                    <h1 style="font-family: MTNBrighterSans-Medium" class="{{$align}} italics leading-[35px] font-[600] text-[25px] border-b-[3px] border-b-gray-500">{{$category->category_name}}</h1>
                    @foreach($category->products as $product)
                        {{$product->product_name}}
                    @endforeach
                </div>

            @endforeach
        </div>
    </section>
</x-layout>
