@livewire('cart')

<div class="p-6 bg-white shadow rounded-lg">
    <h2 class="text-xl font-bold mb-4">Shopping Cart</h2>

    @if ($cart)
        <table class="w-full mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-left">Product</th>
                    <th class="text-left">Price</th>
                    <th class="text-left">Qty</th>
                    <th class="text-left">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                    <tr class="border-b">
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>
                            <button wire:click="decrement({{ $id }})" class="px-2 bg-gray-300">-</button>
                            {{ $item['quantity'] }}
                            <button wire:click="increment({{ $id }})" class="px-2 bg-gray-300">+</button>
                        </td>
                        <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <button wire:click="remove({{ $id }})" class="text-red-600">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold">
            Total: $
            {{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
