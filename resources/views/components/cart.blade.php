<!-- Overlay -->
<div id="cart-overlay" class="fixed inset-0 bg-black/40 hidden"></div>

<!-- Cart Sidebar -->
<div id="cart-sidebar" class="fixed top-0 right-0 h-full bg-white shadow-xl px-[30px] w-[450px] transform translate-x-full transition-transform duration-300 z-[100]">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-[20px] leading-[25px] font-bold" style="font-family: MTNBrighterSans-Medium">Your Cart</h2>
        <button id="close-cart" class="text-gray-500 hover:text-gray-800">✕</button>
    </div>

    <!-- Cart Content -->
    <div class="space-y-2 ">
            {{$slot}}


        <button onclick="window.location.href ='{{route('order.index')}}'" style="font-family: MTNBrighterSans-Medium" class="mt-auto w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Checkout
        </button>
    </div>

</div>
