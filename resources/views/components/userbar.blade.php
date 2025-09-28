@if(Auth::check())
    <div id="userBar" class="w-full -translate-x-full bg-white z-[100] top-[50px] flex flex-col gap-y-[20px] h-[200px] fixed md:hidden">
        <p style="font-family:SSTBold" class="text-[16px] shadow-sm mx-[20px] text-left">{{Auth::user()->first_name}} {{Auth::user()->last_name}} <br>
            <span style="font-family: MTNBrighterSans-Regular" class="text-gray-500 italic inline-block text-right w-full text-[12px]">{{Auth::user()->email}}</span>
        </p>
        @if(Auth::user()->hasRole('admin'))
            <a href="{{route('admin.create.page')}}" style="font-family: MTNBrighterSans-Medium" class="w-full block text-[20px] shadow-md text-blue-500 text-center my-[10px]">Create New Product</a>
        @else
            <a href="{{route('order.main')}}" style="font-family: MTNBrighterSans-Medium" class="w-full block text-[20px] shadow-md text-blue-500 text-center my-[10px]">Your Orders</a>
        @endif

        <a href="{{route('logout')}}" style="font-family: MTNBrighterSans-Medium" class=" font-[600] py-[5px] rounded-md shadow-xl mx-auto bg-blue-500 text-white text-[20px] w-[70%] text-center block ">Log Out</a>
    </div>

@endif
