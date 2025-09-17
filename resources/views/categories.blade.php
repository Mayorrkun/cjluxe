@props([
    'categories'
])
@php
    use Illuminate\Support\Facades\Crypt;
@endphp

<x-layout>

    <section class="px-4 sm:px-[30px] md:px-[100px]">
        <div>
            <!-- Categories Pagination -->
            <div class="mb-6">
                {{$categories->links('vendor.pagination.categories')}}
            </div>

            @foreach($categories as $category)
                @php
                    $align = $category->id % 2 == 0 ? 'text-left' : 'text-right';
                    $products = $category->products()->paginate(8);
                @endphp

                <div class="my-[20px]">
                    <!-- Category Title -->
                    <h1 style="font-family: MTNBrighterSans-Medium"
                        class="{{$align}} italic leading-[28px] md:leading-[35px] font-[600] text-[20px] md:text-[25px] border-b-[3px] mb-[20px] md:mb-[30px] border-b-blue-500">
                        {{$category->category_name}}
                    </h1>

                    <!-- Product Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-y-[20px] md:gap-y-[30px] justify-items-center w-full text-center"
                         style="font-family: MTNBrighterSans-Regular">
                        @foreach($products as $product)
                            <a href="{{route('product.index',['id' => Crypt::encrypt($product->id)])}}"
                               class="w-[120px] sm:w-[140px] md:w-[150px]">
                                <img class="w-full h-auto object-contain"
                                     src="{{url($product->images->first()->img_src)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Product Pagination -->
                <div class="mt-6">
                    {{$products->links('vendor.pagination.products')}}
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
