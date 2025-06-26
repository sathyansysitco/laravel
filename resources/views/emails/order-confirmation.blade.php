<h2>Thank you for your order!</h2>
<p><strong>Name:</strong> {{ $order->name }}</p>
<p><strong>Address:</strong> {{ $order->address }}</p>
<p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

<h4>Items:</h4>
<ul>
@foreach ($order->items as $item)
    <li>{{ $item->product_name }} x {{ $item->quantity }} - ${{ $item->price }}</li>
@endforeach
</ul>
