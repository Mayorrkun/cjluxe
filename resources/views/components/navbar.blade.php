@props(['cart'])
@php
$total = 0;
 @endphp
<nav id="pc-nav" class="hidden md:flex py-[5px] bg-white ">
    <a href="{{route('home')}}" class="max-h-[50px] ml-[50px]">
        <img src="{{url('images/logo/logo.png')}}" alt="try again" class=" h-[60px]">
    </a>
    <div class="text-[20px] ml-auto relative flex flex-row justify-center items-center gap-[20px] px-[20px]">
       @if(Auth::check())
           <div class="flex gap-[20px] max-h-[50px]">
               <button id="profile-btn" class="hover:shadow-2xl transition-all duration-100 ease-in-out border-[1px] border-gray-300 rounded-md px-[2px]"><i class="fa fa-user"></i></button>
               <a href="" class="hover:shadow-2xl transition-all duration-100 ease-in-out"> <i class="fa fa-heart text-white outlined "></i></a>
           </div>

           <div id="profile-div" class="absolute hidden top-[100%] left-0 rounded-md z-[100] shadow-xl w-[300px] text-center py-[20px] bg-white ">
               <p style="font-family:SSTBold" class="text-[16px] mx-[20px] text-left">{{Auth::user()->first_name}} {{Auth::user()->last_name}} <br>
               <span style="font-family: MTNBrighterSans-Regular" class="text-gray-500 italic inline-block text-right w-full text-[12px]">{{Auth::user()->email}}</span>
               </p>
               <a href="{{route('logout')}}" style="font-family: MTNBrighterSans-Medium" class=" font-[600] py-[10px] rounded-md shadow-xl mx-auto bg-violet-900 text-white text-[20px] w-[70%] text-center inline-block">Log Out</a>
           </div>
        @else
            <a href="{{route('login.page')}}"
               class="text-[#ffffff] bg-blue-600 py-[4px] text-[16px] px-[10px] inline-flex rounded-[10px] leading-[20.8px] font-[600] ">Sign In</a>
       @endif
        <form class="flex " role="search" method="GET">
            <input type="search" placeholder="Search products" value="">
            <button class="border border-gray-300 hover:text-blue-400 rounded-r-md px-[10px]">
                <i class="fa fa-search"></i>
            </button>
        </form>
        <button id="cart-btn" class="">
            <i class="fa fa-cart-shopping relative">

            </i>
        </button>
               @if($cart && $cart->cartitems->isNotEmpty())
                   <x-cart>
                       @foreach($cart->cartitems as $cartItem)
                           @php
                           $total = $total + ($cartItem->price * $cartItem->quantity)
                           @endphp
                           <div class="w-full flex gap-[20px] shadow-xl active-a border-b-[2px] my-[20px]">
                               <span class="w-[100px]"><img src="{{url($cartItem->product->images->first()->img_src)}}" alt=""></span>
                               <div class="w-full">
                                   <p style="font-family: MTNBrighterSans-Regular" class="text-[16px] flex block uppercase">{{$cartItem->product->product_name}} <span class="ml-auto"> {{$cartItem->size}}</span></p>
                                   <p style="font-family: MTNBrighterSans-Regular" class="text-[16px] flex text-right"> <span>Quantity:</span> <span class="ml-auto">{{$cartItem->quantity}}</span></p>
                               </div>
                               <a href="{{route('cart.remove',$cartItem->id)}}" class="text-[18px] px-[10px] flex items-center text-red-700">
                                   <span style="font-family: MTNBrighterSans-Medium">X</span>
                               </a>
                           </div>
                       @endforeach
                       <div class="flex "> <a href="{{route('cart.clear',$cart->id)}}" class="ml-auto text-white bg-red-600 py-[10px] px-[15px] rounded-md " style="font-family: MTNBrighterSans-Medium"> Clear Cart </a></div>
                       <p style="font-family: MTNBrighterSans-Medium" class="text-[20px] flex">Total: <span class="ml-auto"> &#8358;{{number_format($total)}}</span></p>
                   </x-cart>
               @endif

    </div>
</nav>
<ul  class="sticky top-0 z-50 hidden md:flex text-[16px] py-[5px] bg-white shadow-md font-[600] px-[20px] gap-[20px] border-t-[1px] border-t-gray-300" style="font-family: MTNBrighterSans-Medium">
   <li class="mr-[100px]" style=""><i class="fa fa-shopping-bag logo inline-flex">CJluxury</i></li>
    <li id="home" class="px-[10px]"><a href="{{route('home')}}"> Home </a></li>
    <li id="categories" class="px-[10px]"><a href="{{route('categories.index')}}"> Categories </a></li>
    <li id="contact" class="px-[10px]"><a href="{{route('contact')}}"> Contact Us </a></li>

</ul>

