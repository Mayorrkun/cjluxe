@props(['product'])
<x-layout>
    <section class="lg:py-[50px] lg:min-h-[500px] min-h-screen lg:px-[50px] flex lg:flex-row flex-col gap-[20px]">
        <!-- Left: Product Images -->
        <div class="lg:w-[50%] w-full h-full px-[10px] lg:px-[20px] shadow-md">
            <span class="w-full flex justify-center">
                <img class="object-contain lg:w-full w-[90%] max-h-[350px] sm:max-h-[400px]" src="{{url($product->images->first()->img_src)}}" alt="">
            </span>

            <!-- Thumbnails -->
            <div class="flex gap-[10px] mt-[20px] w-full py-[10px] overflow-x-auto">
                @foreach($product->images as $image)
                    <span class="w-[60px] sm:w-[70px] border-gray-400 border p-[5px] sm:p-[10px] flex-shrink-0">
                        <img src="{{url($image->img_src)}}" alt="">
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Right: Product Details -->
        <form method="POST" action="{{route('cart.store',$product->id)}}"
              class="lg:w-1/2 w-full bg-white h-full lg:p-[50px] px-[15px] pt-[20px] lg:mb-0 mb-[30px] rounded-lg shadow-xl">
            @csrf
            <h1 style="font-family: MTNBrighterSans-Medium"
                class="block active-a text-left text-[22px] sm:text-[25px] leading-[28px] sm:leading-[30px] uppercase">
                {{$product->product_name}}
            </h1>

            @if($product->discount !== 0)
            @else
                <span style="font-family: SSTBold"
                      class="text-right text-[24px] sm:text-[30px] px-[10px] sm:px-[30px] block mt-[10px] sm:mt-0">
                      &#8358;{{ number_format($product->price)}}
                </span>
            @endif

            <p class="py-[30px] sm:py-[50px] min-h-[120px] sm:min-h-[150px] w-full text-[14px] sm:text-[16px]">
                {{$product->description}}
            </p>

            <!-- Quantity Selector -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between my-[20px] gap-[10px]">
                <span class="text-[16px] sm:text-[20px]" style="font-family: MTNBrighterSans-Medium">Quantity:</span>
                <p class="w-auto flex gap-[5px]">
                    <button id="add-quan" class="w-[35px] sm:w-[40px] text-white bg-blue-400" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                    <input id="quan" name="quantity" class="w-[50px] text-center border border-gray-300" type="number" value="1">
                    <button id="sub-quan" class="w-[35px] sm:w-[40px] text-white bg-blue-400" type="button">
                        <i class="fa fa-minus"></i>
                    </button>
                </p>
            </div>
            <x-error name="quantity"></x-error>

            <!-- Sizes -->
            <div class="flex flex-wrap gap-[15px] sm:gap-[30px]">
                @foreach([['id'=>'M', 'title' => 'Medium'], ['id'=>'L', 'title' => 'Large'], ['id'=>'XL', 'title' => 'Extra-Large']] as $size)
                    <span class="flex items-center gap-[5px] text-[14px] sm:text-[16px]" style="font-family: MTNBrighterSans-Medium">
                        <label>{{$size['title']}}</label>
                        <input type="radio" name="size" value="{{$size['id']}}">
                    </span>
                @endforeach
            </div>
            <x-error name="size"></x-error>

            <!-- Add to Cart Button -->
            <input class="w-full cursor-pointer py-[10px] sm:py-[12px] mt-[20px] text-white text-[16px] sm:text-[18px] bg-blue-400 font-bold rounded-md"
                   value="Add To Cart"
                   style="font-family: MTNBrighterSans-Medium"
                   type="submit">
        </form>
    </section>
</x-layout>
