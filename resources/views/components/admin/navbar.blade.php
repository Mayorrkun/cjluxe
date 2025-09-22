<nav class="hidden md:flex bg-white top-0 fixed w-full py-[5px] z-[200] border-b-[2px] border-b-gray-300">
    <a href="{{route('home')}}" class=" md:ml-auto md:mr-[100px] mx-auto  items-center flex gap-[10px]">
        <img src="{{url('images/logo.png')}}" alt="" class="h-[40px]">
        <h3 class="fa w-auto logo text-black">CJLUXURY</h3>
    </a>
</nav>
{{--mobile nav--}}
<nav id="mobile-nav" class="md:hidden sticky top-0 flex py-[5px] bg-white justify-between items-center z-[150]">
    <a class="max-h-[50px] flex">
        <img src="{{ url('images/logo.png') }}" alt="" class="h-[50px]">
    </a>

    <button id="dropdown-btn" class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
        <i class="fa fa-shopping-bag logo inline-flex w-auto">CJluxury</i>
        <i id="arrow" class="fa fa-chevron-down"></i>
    </button>

    <div class="flex gap-[10px] ">
    <ul id="droplist" class="absolute top-[100%] left-0 bg-white w-full px-[20px] z-[100] hidden" style="font-family: MTNBrighterSans-Medium">
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('admin.home') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">Home</a>
        </li>
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('admin.products') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">View Products</a>
        </li>
        <li class="block w-full my-[10px] shadow-sm">
            <a href="{{ route('contact') }}" class="w-full h-full py-[5px] px-[20px] text-[18px]">View Orders</a>
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

    </div>

    @if(Auth::check())
        <div class="flex gap-[20px] max-h-[50px]">
            <button id="mobile-profile-btn" class="hover:shadow-2xl transition-all duration-100 ease-in-out border-[1px] border-gray-300 text-[20px] rounded-md px-[2px]"><i class="fa fa-user"></i></button>
        </div>
    @endif

    <x-userbar></x-userbar>
</nav>
