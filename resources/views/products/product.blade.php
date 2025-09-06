@props(['product'])
<x-layout>
    <x-navbar></x-navbar>
    <section class="py-[50px] min-h-[500px] px-[50px] flex">
        <div class="w-[50%] h-full px-[20px] shadow-md">
            <span class="w-full flex">
                <img class=" object-contain w-full" src="{{url($product->images->first()->img_src)}}" alt="">
            </span>
            <div class="flex gap-[10px] mt-[20px] w-full py-[10px]">
                @foreach($product->images as $image)
                    <span class="w-[70px] border-gray-400 border p-[10px]">
                        <img src="{{url($image->img_src)}}" alt="">
                    </span>
                @endforeach
            </div>
        </div>
        <form method="POST" action="{{route('cart.store',$product->id)}}" class="w-1/2 bg-white h-full p-[50px] ">
            @csrf
            <h1 style="font-family: MTNBrighterSans-Medium"  class="block active-a text-left text-[25px] leading-[30px] uppercase">{{$product->product_name}}</h1>
            @if($product->discount !== 0)
            @else
                <span style="font-family: SSTBold" class="text-right text-[30px] px-[30px] block">&#8358;{{ number_format($product->price)}}</span>
            @endif

            <p class="py-[50px] min-h-[200px] w-full">
                {{$product->description}}
            </p>
            <div class="flex my-[20px]">
                <span class="text-[20px] items-center" style="font-family: MTNBrighterSans-Medium">Quantity:</span>
                <p class="w-auto flex gap-[5px] ml-auto">
                    <button id="add-quan" class="w-[40px] text-white bg-blue-400" type="button"> <i class="fa fa-plus"></i></button>
                    <input id="quan" name="quantity" class="w-[50px] text-center" type="number" value="1" >
                    <button id="sub-quan" class="w-[40px] text-white bg-blue-400" type="button"> <i class="fa fa-minus"></i></button></p>
            </div>
            <x-error name="quantity"></x-error>
            <div class="flex gap-[30px]">
                @foreach([['id'=>'M', 'title' => 'Medium'], ['id'=>'L', 'title' => 'Large'], ['id'=>'XL', 'title' => 'Extra-Large']] as $size)
                 <span class="flex items-center gap-[5px]" style="font-family: MTNBrighterSans-Medium"> <label for="">{{$size['title']}}</label> <input type="radio" name="size" class="" value="{{$size['id']}}"> </span>
                @endforeach
            </div>
            <x-error name="size"></x-error>

            <input class="w-full cursor-pointer py-[5px] mt-[20px] text-white text-25px bg-blue-400  font-bold" value="Add To Cart" style="font-family: MTNBrighterSans-Medium" type="submit">

        </form>
    </section>
</x-layout>
