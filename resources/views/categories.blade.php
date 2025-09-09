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
                    <h1 style="font-family: MTNBrighterSans-Medium" class="{{$align}} italics leading-[35px] font-[600] text-[25px] border-b-[3px] mb-[10px] border-b-blue-500">{{$category->category_name}}</h1>
                   <div class="flex w-full gap-[20px]">
                       @foreach($category->products as $product)
                           <span class=" max-w-[100px] flex  border-transparent border-[3px] border-r-blue-200">
                            <img src="{{url($product->images->first()->img_src)}}" alt="">
                        </span>
                       @endforeach
                   </div>
                    <a href="" class=" items-center text-[14px] flex  text-blue-700 justify-end" style="font-family: MTNBrighterSans-Medium"> see more <i class="fa fa-ellipsis"></i> <i class="fa fa-arrow-right"></i></a>
                </div>

            @endforeach
        </div>
    </section>
</x-layout>
