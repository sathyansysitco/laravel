<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">My Orders</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        @if ($orders->count())
            <table class="w-full table-auto">
                <thead>
                    <tr class="border-b text-left">
                        <th>Order ID</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b">
                            <td>#{{ $order->id }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('order.invoice', $order->id) }}"
                                   class="text-blue-600 hover:underline">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $orders->links() }}
            </div>
        @else
            <p>You have not placed any orders yet.</p>
        @endif
    </div>
</x-app-layout>
