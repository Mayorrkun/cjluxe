@props(['orders'])
<x-admin.layout>
    <section class="p-6" style="font-family: MTNBrighterSans-Regular">
        <h1 class="text-2xl font-bold mb-6">All Orders</h1>

        <div class="overflow-x-auto bg-white shadow rounded-lg" >
            <table class="min-w-full border-collapse">
                <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-1 py-2 border-b">Reference</th>
                    <th class="px-4 py-2 border-b">Recipient</th>
                    <th class="px-4 py-2 border-b">Payment Status</th>
                    <th class="px-2 py-2 border-b">Delivery Status</th>
                    <th class="px-4 py-2 border-b">Date</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    @php
                        $delivery = '';
                        if($order->is_delivered === 0){
                            $delivery = 'Not Delivered';
                        }
                        else{
                            $delivery = 'Delivered';
                        }
                    @endphp

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.order',['order' => $order->id]) }}"
                               class="text-blue-600 hover:underline">
                                {{ $order->reference }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border-b">
                            {{ $order->recipient ?? 'Guest' }}
                        </td>
                        <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 rounded text-sm
                                    {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                        </td>
                        <td class="px-4 py-2 border-b">
                               {{$delivery}}
                        </td>
                        <td class="px-4 py-2 border-b">
                            {{ $order->created_at->format('M d, Y H:i') }}
                        </td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{route('admin.order',['order' => $order->id]) }}"
                               class="text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-admin.layout>

