@props(["cart"])
@php
    $total = 0;
    $states = ['Lagos','Ogun', 'Oyo']
@endphp

<x-layout>
    <x-error name="error"></x-error>
    <section class="px-4 md:px-[50px]">
        <div class="mb-[20px] py-[20px] flex flex-col lg:flex-row gap-[30px] lg:gap-[50px] w-full">

            {{-- CART TABLE --}}
            <div class="overflow-x-auto">
                <table style="font-family: MTNBrighterSans-Medium"
                       class="min-w-full lg:w-[600px] bg-white leading-tight py-[10px] border-separate border-spacing-x-2 text-sm md:text-base">
                    <thead>
                    <tr class="leading-tight py-[10px]">
                        <td class="w-[80px] md:w-[100px] p-0 text-center"></td>
                        <td class="w-[100px] p-0 text-center">Title</td>
                        <td class="p-0 text-center">Quantity</td>
                        <td class="p-0 text-center">Price</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->cartitems as $item)
                        @php $total = $total + ($item->price * $item->quantity) @endphp
                        <tr class="h-[60px] p-0 shadow-md">
                            <td class="h-[50px] p-0 text-center">
                                <img class="h-[40px] md:h-[50px] object-contain mx-auto"
                                     src="{{url($item->product->images->first()->img_src)}}" alt="">
                            </td>
                            <td class="w-[100px] p-0 text-center">{{$item->product->product_name}}</td>
                            <td class="p-0 text-center">{{$item->quantity}}</td>
                            <td class="p-0 text-center">&#8358;{{number_format($item->price)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-right text-[18px] md:text-[22px]">
                        <td>Total:</td>
                        <td></td>
                        <td>&#8358;{{number_format($total)}}</td>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            {{-- DELIVERY FORM --}}
            <form action="{{route('order.checkout')}}" method="POST"
                  class="min-h-[500px] px-4 md:px-[50px] bg-white w-full lg:w-[800px] rounded-md pt-[20px]">
                @csrf
                <h1 class="text-[24px] md:text-[35px] block text-left border-transparent border-b-blue-500 my-[20px] border-[1px]"
                    style="font-family: SSTBold">
                    Delivery Details
                </h1>
                <main style="font-family: MTNBrighterSans-Regular">

                    <div class="flex gap-[20px] flex-col md:flex-row">
                        <span class="w-full">
                            <input type="text" class="my-[10px] w-full text-right border rounded p-2"
                                   name="recipient" placeholder="Recipient Name"
                                   value="{{Auth::user()->first_name}}">
                            <x-error name="recipient"></x-error>
                        </span>
                        <span class="w-full">
                            <input type="tel" class="my-[10px] w-full text-right border rounded p-2"
                                   name="phone" placeholder="Phone Number">
                            <x-error name="phone"></x-error>
                        </span>
                    </div>

                    <input type="text" name="address"
                           class="w-full block my-[10px] text-right border rounded p-2"
                           placeholder="Delivery Address">
                    <x-error name="address"></x-error>

                    <div class="flex gap-[20px] flex-col md:flex-row">
                        <span class="w-full">
                            <input type="text" name="city"
                                   class="my-[10px] w-full text-right border rounded p-2"
                                   placeholder="City">
                            <x-error name="city"></x-error>
                        </span>
                        <span class="w-full">
                            <select id="state" name="state"
                                    class="my-[10px] w-full text-right border rounded p-2">
                                <option selected>State</option>
                                @foreach($states as $state)
                                    <option value="{{$state}}">{{$state}}</option>
                                @endforeach
                            </select>
                            <x-error name="state"></x-error>
                        </span>
                    </div>

                    <div style="font-family: MTNBrighterSans-Regular" id="del-fees"
                         class="hidden text-right text-blue-700 block mt-2 text-sm md:text-base">
                        Delivery Fee to <span id="location"></span> is <span id="fees"></span>
                    </div>
                </main>
                <input style="font-family: MTNBrighterSans-Medium" type="submit"
                       class="bg-blue-700 text-white text-center py-[10px] my-[30px] block w-full text-[18px] md:text-[20px] rounded"
                       value="Head To Payment">
            </form>
        </div>
    </section>
</x-layout>
