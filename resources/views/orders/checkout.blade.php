@props(["cart"])
@php $total = 0; @endphp
<x-layout>
    <x-navbar></x-navbar>
    <section class="px-[50px]">
<div class="mx-[35px] mb-[20px] py-[20px] flex gap-[50px] w-full">
    <table style="font-family: MTNBrighterSans-Medium"
           class="w-[600px] bg-white leading-tight py-[10px] table-fixed border-separate border-spacing-x-2">
        <thead>
        <tr class="max-h-[30px] leading-tight py-[10px]">
            <td class="w-[100px] p-0 text-center"> </td>
            <td class="w-[100px] p-0 text-center">Title</td>
            <td class="p-0 text-center">Quantity</td>
            <td class="p-0 text-center">Price</td>
        </tr>
        </thead>
        <tbody class="overflow-y-auto h-[300px]">
        @foreach($cart->cartitems as $item)
            @php $total = $total + ($item->price * $item->quantity) @endphp
            <tr class="h-[60px] p-0 shadow-md">
                <td class="h-[50px] p-0 text-center tb-img">
                    <img class="h-[50px] object-contain"
                         src="{{url($item->product->images->first()->img_src)}}"
                         alt="">
                </td>
                <td class="w-[100px] tb-title p-0 text-center">{{$item->product->product_name}}</td>
                <td class="p-0 text-center tb-quan">{{$item->quantity}}</td>
                <td class="p-0 text-center tb-price">&#8358;{{number_format($item->price)}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot class="">
        <tr class="text-right text-[22px]">
            <td></td>
            <td>Total:</td>
            <td></td>
            <td>&#8358;{{number_format($total)}}</td>
        </tr>
        </tfoot>
    </table>

    <form action="" class="min-h-[500px] bg-white w-full"></form>
</div>
    </section>
</x-layout>
