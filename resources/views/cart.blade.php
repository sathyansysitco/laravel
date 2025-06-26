<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Your Cart</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <table class="w-full mb-6">
            <thead>
                <tr class="border-b text-left">
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                @foreach ($cart as $id => $item)
                    <tr data-id="{{ $id }}">
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <button class="decrement px-2 bg-gray-300">-</button>
                            <span class="quantity">{{ $item['quantity'] }}</span>
                            <button class="increment px-2 bg-gray-300">+</button>
                        </td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td><button class="remove text-red-600">Remove</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a href="{{ url('checkout') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                Proceed to Checkout
            </a>
        </div>

        <a href="{{ url('/products') }}" class="text-blue-600">← Back to products</a>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.increment').on('click', function() {
                    let row = $(this).closest('tr');
                    let id = row.data('id');

                    $.post('{{ route('cart.increment') }}', {
                        product_id: id,
                        _token: '{{ csrf_token() }}'
                    }, function() {
                        location.reload();
                    });
                });

                $('.decrement').on('click', function() {
                    let row = $(this).closest('tr');
                    let id = row.data('id');

                    $.post('{{ route('cart.decrement') }}', {
                        product_id: id,
                        _token: '{{ csrf_token() }}'
                    }, function() {
                        location.reload();
                    });
                });

                $('.remove').on('click', function() {
                    let row = $(this).closest('tr');
                    let id = row.data('id');

                    $.post('{{ route('cart.remove') }}', {
                        product_id: id,
                        _token: '{{ csrf_token() }}'
                    }, function() {
                        location.reload();
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
