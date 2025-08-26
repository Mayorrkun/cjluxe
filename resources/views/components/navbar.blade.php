<nav class="hidden lg:flex py-[10px] shadow-md ">
    <div class="max-h-[50px] ml-[50px]">
        <img src="{{url('images/logo/logo.png')}}" alt="try again" class=" h-[60px]">
    </div>

    <div class=" text-[20px] ml-auto flex flex-row justify-center items-center gap-[30px] px-[20px]">
        <a href=""
        class="text-[#ffffff] bg-blue-600 py-[4px] text-[16px] px-[10px] inline-flex rounded-[10px] leading-[20.8px] font-[600] ">Sign In</a>
        <form class="flex " role="search" method="GET">
            <input type="search" placeholder="Search products" value="">
            <button class="border border-gray-300 hover:text-blue-400 rounded-r-md px-[10px]">
                <i class="fa fa-search"></i>
            </button>
        </form>
        <button id="home-cart-btn" class="">
            <i class="fa fa-cart-shopping relative">

            </i>
        </button>
    </div>
</nav>
