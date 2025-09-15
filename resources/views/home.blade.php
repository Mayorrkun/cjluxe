@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@props(['products','cart'])
<x-layout>
    <x-navbar></x-navbar>
    <section class="swiper md:h-[400px] h-[300px]">
        <div class="swiper-wrapper">
            <div style="background-image: url('/images/media/model1.jpg');"  class="swiper-slide bg-cover bg-center bg-no-repeat flex h-full">
                <div class="mx-[50px] px-[30px] md:max-w-[600px] md:py-[100px] fade-in text-white shadow-md" >
                    <h1 class="text-[45px] leading-[55px]" style="font-family: MTNBrighterSans-Medium">The Best Just For You</h1>
                    <p class="text-[20px] w-full leading-[22px] my-[50px]" style="font-family: MTNBrighterSans-Light">
                        <span class="fa w-auto"> CJLUXURY</span> is sure to provide you with the best apparel to fit your tastes.
                        <br>
                        Check out some of our best sellers today
                        <span class=" my-[10px] flex">
                            <a class="text-[25px] px-[15px] py-[10px] rounded-full shadow-md  border-blue-600 border ml-auto text-white bg-blue-400 w-auto mt-[20px] bg-opacity-60" style="font-family: MTNBrighterSans-Medium" href="">See More...</a>
                        </span>
                    </p>

                </div>

                </div>

            <div style="background-image: url('/images/media/clothingbg.jpg');"  class="swiper-slide bg-cover bg-center bg-no-repeat flex h-full>
                ">
                <div class="mr-[50px] ml-auto px-[30px] md:max-w-[600px] md:py-[100px] fade-in text-white shadow-md" >
                    <h1 class="text-[45px] leading-[55px]" style="font-family: MTNBrighterSans-Medium">The Best Just For You</h1>
                    <p class="text-[20px] w-full leading-[22px] my-[50px]" style="font-family: MTNBrighterSans-Light">
                        <span class="fa w-auto"> CJLUXURY</span> is sure to provide you with the best apparel to fit your tastes.
                        <br>
                        Check out some of our best sellers today
                        <span class=" my-[10px] flex">
                            <a class="text-[25px] px-[15px] py-[10px] rounded-full shadow-md  border-blue-600 border ml-auto text-white bg-blue-400 w-auto mt-[20px] bg-opacity-60" style="font-family: MTNBrighterSans-Medium" href="">See More...</a>
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>
    <section class="py-[50px] px-[50px]">
        <div class="grid grid-cols-5 gap-[50px]">
            @foreach($products as $product)
                @php
                $encrypted = Crypt::encrypt($product->id)
                @endphp
                <a class=" px-[20px] w-[200px] pb-[10px] border-transparent border-[3px] border-r-blue-200 border-b-blue-100" href="{{route('product.index',['id' => $encrypted])}}">
                    <span class="w-full max-h-[260px] "><img src="{{url($product->images->first()->img_src)}}" alt=""></span>
                </a>
            @endforeach
        </div>
    </section>
</x-layout>
