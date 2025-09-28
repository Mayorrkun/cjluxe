@props(['orders'])
<x-admin.layout>
    <section class="p-6" style="font-family: MTNBrighterSans-Regular">
        <h1 class="text-2xl font-bold mb-6">All Orders</h1>

        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border-collapse">
                <thead>
                <tr class="bg-gray-100 text-left text-sm">
                    <th class="px-4 py-2 border-b">Reference</th>
                    <th class="px-4 py-2 border-b">Recipient</th>
                    <th class="px-4 py-2 border-b">Payment Status</th>
                    <th class="px-4 py-2 border-b">Delivery Status</th>
                    <th class="px-4 py-2 border-b">Date</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    @php
                        $delivery = $order->is_delivered ? 'Delivered' : 'Not Delivered';
                    @endphp

                    <tr class="hover:bg-gray-50 text-sm">
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.order',['order' => $order->id]) }}"
                               class="text-blue-600 hover:underline">
                                {{ $order->reference }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border-b">{{ $order->recipient ?? 'Guest' }}</td>
                        <td class="px-4 py-2 border-b">
                            <span class="px-2 py-1 rounded text-xs
                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border-b">{{ $delivery }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{route('admin.order',['order' => $order->id]) }}"
                               class="text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Card View --}}
        <div class="space-y-4 md:hidden">
            @forelse($orders as $order)
                @php
                    $delivery = $order->is_delivered ? 'Delivered' : 'Not Delivered';
                @endphp

                <div class="bg-white shadow rounded-lg p-4 text-sm">
                    <div class="flex justify-between">
                        <span class="font-semibold">Reference:</span>
                        <a href="{{ route('admin.order',['order' => $order->id]) }}"
                           class="text-blue-600 hover:underline">
                            {{ $order->reference }}
                        </a>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span class="font-semibold">Recipient:</span>
                        <span>{{ $order->recipient ?? 'Guest' }}</span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span class="font-semibold">Payment:</span>
                        <span class="px-2 py-1 rounded text-xs
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span class="font-semibold">Delivery:</span>
                        <span>{{ $delivery }}</span>
                    </div>
                    <div class="flex justify-between mt-2">
                        <span class="font-semibold">Date:</span>
                        <span>{{ $order->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('admin.order',['order' => $order->id]) }}"
                           class="text-blue-500 hover:underline">View</a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center">No orders found.</p>
            @endforelse
        </div>
    </section>
</x-admin.layout>
