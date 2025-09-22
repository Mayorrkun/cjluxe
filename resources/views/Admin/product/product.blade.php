@props(['product',])
<x-admin.layout >
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
        <div class="w-full px-[50px]" style="font-family: MTNBrighterSans-Regular">
            <h1 class="block border-b border-b-blue-600 text-[20px] font-[600] text-center">{{$product->product_name}}</h1>
            <form class="w-full py-[20px]">
                @csrf
                <p class="my-[10px]">
                    <span class="block">Product Description</span>
                    <textarea name="description" class="w-full p-0">{{$product->description}}
                    </textarea>
                </p>
                <p>
                    <span class="flex justify-between">
                        <label>Quanity:</label> <input type="number" value="{{$product->quantity}}" class="w-[70px]">
                    </span>
                    <span class="flex justify-between">
                        <label>Price:</label> <input type="number" value="{{$product->price}}" class="w-[90px]">
                    </span>
                </p>

                <p class="flex w-full justify-between gap-[40px]">
                    <a href="" class=" text-[16px] w-full text-center py-[5px] text-white bg-red-600 rounded-md shadow-md">Delete Item</a>
                    <button class=" text-[16px] w-full text-center py-[5px] text-white bg-blue-600 rounded-md shadow-md">Edit Item</button>
                </p>
            </form>

        </div>
    </section>
</x-admin.layout>
