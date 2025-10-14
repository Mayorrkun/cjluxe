@props(['cart'])
@php
$total = 0;
if($cart){
$count = $cart->cartitems->count();
}
else {
    $count = 0;
}
 @endphp
<nav id="pc-nav" class="hidden md:flex py-[5px] bg-white w-full sticky top-0 z-[150] ">
    <a href="{{route('home')}}" class="max-h-[50px] ml-[50px]">
        <img src="{{url('images/logo/logo.png')}}" alt="try again" class=" h-[60px]">
    </a>
    <div class="text-[20px] ml-auto relative flex flex-row justify-center items-center gap-[20px] px-[20px]">
       @if(Auth::check())
           <div class="flex gap-[20px] max-h-[50px]">
               <button id="profile-btn" class="hover:shadow-2xl transition-all duration-100 ease-in-out border-[1px] border-gray-300 rounded-md px-[2px]"><i class="fa fa-user"></i></button>
           </div>

           <div id="profile-div" class="absolute hidden top-[100%] left-0 rounded-md z-[100] shadow-xl w-[300px] text-center py-[20px] bg-white ">
               <p style="font-family:SSTBold" class="text-[16px] shadow-sm mx-[20px] text-left">{{Auth::user()->first_name}} {{Auth::user()->last_name}} <br>
               <span style="font-family: MTNBrighterSans-Regular" class="text-gray-500 italic inline-block text-right w-full text-[12px]">{{Auth::user()->email}}</span>
               </p>
               <a href="{{route('order.main')}}" style="font-family: MTNBrighterSans-Medium" class="w-full block text-[20px] shadow-md text-blue-500 text-center my-[10px]">Your Orders</a>
               <a href="{{route('logout')}}" style="font-family: MTNBrighterSans-Medium" class=" font-[600] py-[5px] rounded-md shadow-xl mx-auto bg-blue-500 text-white text-[20px] w-[70%] text-center inline-block">Log Out</a>
           </div>
        @else
            <a href="{{route('login.page')}}"
               class="text-[#ffffff] bg-blue-600 py-[4px] text-[16px] px-[10px] inline-flex rounded-[10px] leading-[20.8px] font-[600] w-[100px]">Sign In</a>
       @endif
           <form class="flex relative w-full max-w-md"
                 role="search"
                 method="GET"
                 action="{{ route('products.search') }}" {{-- fallback full search --}}
                 x-data="{
        query: '',
        results: [],
        search() {
            if (this.query.length > 1) {
                fetch(`/search?query=${this.query}`)
                    .then(res => res.json())
                    .then(data => this.results = data);
            } else {
                this.results = [];
            }
        }
      }"
                 @click.outside="results = []">

               <!-- Search input -->
               <input type="text"
                      name="query"
                      x-model="query"
                      @input="search"
                      placeholder="Search products..."
                      class="w-full border rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

               <!-- Search button (fallback full search) -->
               <button type="submit"
                       class="border border-gray-300 hover:text-blue-400 rounded-r-md px-3">
                   <i class="fa fa-search"></i>
               </button>

               <!-- Live results dropdown -->
               <div x-show="results.length > 0"
                    class="absolute top-full left-0 right-0 mt-1 bg-white border rounded-lg shadow-lg max-h-60 overflow-y-auto z-[150]">
                   <template x-for="item in results" :key="item.id">
                       <a :href="`/product/${item.id}`"
                          class="flex items-start gap-2 px-4 py-2 hover:bg-gray-100">
                           <!-- Optional thumbnail -->
                           <img :src="item.image" alt="" class="w-10 h-10 object-cover rounded">
                           <div style="font-family: MTNBrighterSans-Regular;">
                               <div class="text-sm text-gray-600 w-full text-right trucate" x-text="item.name"></div>
                           </div>
                       </a>
                   </template>
               </div>
           </form>

           <button id="cart-btn" class=" items-center flex-row flex">
            <i class="fa fa-cart-shopping relative">
            </i>
               <span class="text-black">{{$count}}</span>
        </button>
               @if($cart && $cart->cartitems->isNotEmpty())
                   <x-cart :cart="$cart"> </x-cart>
               @endif

    </div>
</nav>
<ul  class="sticky hidden md:flex text-[16px] py-[5px] bg-white shadow-md font-[600] px-[20px] gap-[20px] border-t-[1px] border-t-gray-300" style="font-family: MTNBrighterSans-Medium">
   <li class="mr-[100px]" style=""><i class="fa fa-shopping-bag logo inline-flex">CJluxury</i></li>
    <li id="home" class="px-[10px]"><a href="{{route('home')}}"> Home </a></li>
    <li id="categories" class="px-[10px]"><a href="{{route('categories.index')}}"> Categories </a></li>
    <li id="contact" class="px-[10px]"><a href="{{route('contact')}}"> Contact Us </a></li>
</ul>

{{-- mobile --}}
<nav id="mobile-nav" class="md:hidden sticky top-0 flex py-[5px] bg-white justify-between items-center z-[150]">
    <a class="max-h-[50px] flex" href="{{route('home')}}">
        <img src="{{ url('images/logo/logo.png') }}" alt="" class="h-[50px]">
    </a>

    <button id="dropdown-btn" class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
        <i class="fa fa-shopping-bag logo inline-flex w-auto">CJluxury</i>
        <i id="arrow" class="fa fa-chevron-down"></i>
    </button>

    <div class="flex gap-[10px] ">
        @if(Auth::check())
            <div class="flex gap-[20px] max-h-[50px]">
                <button id="mobile-profile-btn" class="hover:shadow-2xl transition-all duration-100 ease-in-out border-[1px] border-gray-300 text-[20px] rounded-md px-[2px]"><i class="fa fa-user"></i></button>
            </div>
        @endif
        <button id="mobile-cart-btn" class="items-center flex-row flex">
            <i class="fa fa-cart-shopping text-[20px]"></i>
            <span class="text-black">{{ $count }}</span>
        </button>
    </div>
    <x-userbar></x-userbar>
    @if($cart && $cart->cartitems->isNotEmpty())
        <x-mobilecart :cart="$cart"></x-mobilecart>
    @endif

    <ul id="droplist" class="absolute top-[100%] left-0 bg-white w-full px-[20px] z-[100] hidden" style="font-family: MTNBrighterSans-Medium">
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('home') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">Home</a>
        </li>
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('categories.index') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">Categories</a>
        </li>
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('contact') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">Contact</a>
        </li>
        @if(!Auth::check())
            <li class="flex w-full my-[10px] shadow-sm">
                <a href="{{ route('login.page') }}" class="w-full h-full bg-blue-500 text-white py-[5px] px-[20px] text-[18px] text-center">Sign in</a>
            </li>
        @endif

        {{-- Search --}}
        <li class="w-full my-[5px]">
            <form class="w-full flex relative"
                  role="search"
                  method="GET"
                  action="{{ route('products.search') }}"
                  x-data="{
                        query: '',
                        results: [],
                        search() {
                            if (this.query.length > 1) {
                                fetch(`/search?query=${this.query}`)
                                    .then(res => res.json())
                                    .then(data => this.results = data);
                            } else {
                                this.results = [];
                            }
                        }
                  }"
                  @click.outside="results = []">

                <input type="text"
                       name="query"
                       x-model="query"
                       @input="search"
                       placeholder="Search..."
                       class="w-full h-[40px] border px-2 rounded-l-md focus:outline-none">

                <button type="submit" class="bg-blue-500 text-white w-auto px-[10px] h-[40px] rounded-r-md">
                    <i class="fa fa-search"></i>
                </button>

                {{-- Search preview results --}}
                <div x-show="results.length > 0"
                     class="absolute top-full left-0 right-0 mt-1 bg-white border rounded-lg shadow-lg max-h-60 overflow-y-auto z-[150]">
                    <template x-for="item in results" :key="item.id">
                        <a :href="`/product/${item.id}`"
                           class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                            <img :src="item.image" alt="" class="w-10 h-10 object-cover rounded">
                            <div style="font-family: MTNBrighterSans-Regular;">
                                <div class="text-sm text-gray-600 truncate" x-text="item.name"></div>
                            </div>
                        </a>
                    </template>
                </div>
            </form>
        </li>
    </ul>

</nav>
