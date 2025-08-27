<nav class="hidden md:flex py-[5px] ">
    <div class="max-h-[50px] ml-[50px]">
        <img src="{{url('images/logo/logo.png')}}" alt="try again" class=" h-[60px]">
    </div>
    <div class=" text-[20px] ml-auto flex flex-row justify-center items-center gap-[30px] px-[20px]">
       @if(Auth::check())

        @else
            <a href=""
               class="text-[#ffffff] bg-blue-600 py-[4px] text-[16px] px-[10px] inline-flex rounded-[10px] leading-[20.8px] font-[600] ">Sign In</a>
       @endif
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
<ul id="second-nav" class="hidden md:flex text-[16px] py-[5px] shadow-md font-[600] px-[20px] gap-[20px] border-t-[1px] border-t-gray-300" style="font-family: MTNBrighterSans-Medium">
   <li class="mr-[100px]" style=""><i class="fa fa-shopping-bag">CJluxury</i></li>
    <li id="home" class="px-[10px]"><a href=""> Home </a></li>
    <li id="about" class="px-[10px]"><a href=""> New Arrrivals </a></li>
    <li id="about" class="px-[10px]"><a href=""> Categories </a></li>
    <li id="contact" class="px-[10px]"><a href=""> Contact Us </a></li>

</ul>
