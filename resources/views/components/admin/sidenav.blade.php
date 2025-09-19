<nav class="z-[100] fixed md:w-[250px] mt-[50px] bg-white text-black h-full pt-[25px] hidden md:flex flex-col">
    <ul class="flex flex-col w-full px-[30px] gap-y-[20px]" style="font-family: MTNBrighterSans-Regular">
        <li class="border-t-gray-200 shadow-md border-t w-full">
            <a href="{{route('admin.home')}}" class="w-full block pl-[50px] text-[20px] font-[500]">Home</a>
        </li>
        <li class="border-t-gray-200 shadow-md border-t w-full" id="orders-list">
            <a href="" class="w-full flex items-center pl-[50px] pr-[10px] text-[20px] font-[500]">Orders</a>
        </li>
        <li class="border-t-gray-200 shadow-md border-t w-full" id="products-list">
            <button id="products-btn" class="w-full flex items-center pl-[50px] pr-[10px] text-[20px] font-[500]">Products <i id="drop-i-admin" class="fa fa-chevron-down text-[12px] ml-auto"></i></button>
            <div id="product-dropdown" class=" max-h-0 overflow-hidden transition-all duration-500 ease-in-out flex flex-col text-[15px] py-[10px]" style="max-height: 0;">
                <a href="" class="py-[5px] border-y border-y-gray-200 w-full bg-blue-400 text-center text-white">View Products</a>
                <a href="" class="py-[5px] border-y border-y-gray-200 w-full bg-blue-400 text-center text-white">Create New Product</a>
            </div>
        </li>
    </ul>
    <a style="font-family: MTNBrighterSans-Medium" href="{{route('logout')}}" class="w-full mt-auto mb-[100px] bg-blue-400 block gap-[20px] items-center text-center text-[20px] pb-[5px] text-white border-y-white my-[10px]"> Log Out</a>
</nav>
