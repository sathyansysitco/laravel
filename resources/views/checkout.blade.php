<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <ul class="mb-4">
                    @foreach ($cart as $item)
                        <li class="py-2 border-b">
                            {{ $item['name'] }} - ${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}
                        </li>
                    @endforeach
                </ul>

                <h3 class="text-lg font-bold mb-4">Total: ${{ number_format($total, 2) }}</h3>

                {{-- <div id="paypal-button-container" class="mb-6"></div> --}}
                <form method="POST" action="{{ route('checkout.process') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Your Name</label>
                        <input type="text" name="name" class="border p-2 rounded w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Address</label>
                        <textarea name="address" class="border p-2 rounded w-full" required></textarea>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Place Order
                    </button>
                </form>

                <a href="{{ url('/cart') }}" class="text-blue-600 hover:underline">← Back to Cart</a>

                <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>

                <script>
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: '{{ number_format($total, 2, '.', '') }}'
                                    }
                                }]
                            });
                        },
                        onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                                alert('Payment completed by ' + details.payer.name.given_name);
                            });
                        }
                    }).render('#paypal-button-container');
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
