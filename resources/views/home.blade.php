@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@props(['products','cart'])
<x-layout>

    <!-- Hero Swiper -->
    <section class="swiper md:h-[400px] z-0 h-[300px]">
        <div class="swiper-wrapper z-0">
            <!-- Slide 1 -->
            <div style="background-image: url('/images/media/model1.jpg');" class="swiper-slide bg-cover bg-center bg-no-repeat flex h-full ">
                <div class=" py-[50px] md:mx-[50px] px-4 md:px-[30px] md:max-w-[600px] md:py-[100px] fade-in text-white shadow-md flex flex-col justify-center">
                    <h1 class="text-[28px] md:text-[45px] leading-[36px] md:leading-[55px]" style="font-family: MTNBrighterSans-Medium">
                        The Best Just For You
                    </h1>
                    <p class="text-[16px] md:text-[20px] w-full leading-[22px] md:leading-[28px] my-[20px] md:my-[50px]" style="font-family: MTNBrighterSans-Light">
                        <span class="fa w-auto"> CJLUXURY</span> is sure to provide you with the best apparel to fit your tastes.
                        <br>
                        Check out some of our best sellers today
                    </p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div style="background-image: url('/images/media/clothingbg.jpg');" class="swiper-slide bg-cover bg-center bg-no-repeat flex h-full">
                <div class="py-[50px] md:mr-[50px] md:ml-auto px-4 md:px-[30px] md:max-w-[600px] md:py-[100px] fade-in text-white shadow-md flex flex-col justify-center">
                    <h1 class="text-[28px] md:text-[45px] leading-[36px] md:leading-[55px]" style="font-family: MTNBrighterSans-Medium">
                        The Best Just For You
                    </h1>
                    <p class="text-[16px] md:text-[20px] w-full leading-[22px] md:leading-[28px] my-[20px] md:my-[50px]" style="font-family: MTNBrighterSans-Light">
                        <span class="fa w-auto"> CJLUXURY</span> is sure to provide you with the best apparel to fit your tastes.
                        <br>
                        Check out some of our best sellers today
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Grid -->
    <section class="py-[30px] md:py-[50px] px-[20px] md:px-[50px]">
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-[20px] md:gap-[50px] justify-items-center">
            @foreach($products as $product)
                @php
                    $encrypted = Crypt::encrypt($product->id)
                @endphp
                <a class="px-[10px] md:px-[20px] w-full sm:w-[160px] md:w-[200px] pb-[10px] rounded-md shadow-md"
                   href="{{route('product.index',['id' => $encrypted])}}">
                    <span class="w-full max-h-[260px] flex justify-center">
                        <img class="w-full h-auto object-contain" src="{{url($product->images->first()->img_src)}}" alt="">
                    </span>
                </a>
            @endforeach
        </div>
        {{$products->links('vendor.pagination.products')}}
    </section>
</x-layout>
