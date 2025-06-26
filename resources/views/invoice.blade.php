<h2>Invoice #{{ $order->id }}</h2>
<p><strong>Name:</strong> {{ $order->name }}</p>
<p><strong>Address:</strong> {{ $order->address }}</p>
<p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>

<table width="100%" style="border-collapse: collapse;" border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Item</th><th>Qty</th><th>Price</th><th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 style="text-align:right;">Grand Total: ${{ number_format($order->total, 2) }}</h3>
