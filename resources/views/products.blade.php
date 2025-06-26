<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <div class="border p-4 rounded-lg shadow hover:shadow-lg transition">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}test</h3>
                            <p class="text-gray-700 mb-1">Price:
                                <strong>${{ number_format($product->price, 2) }}</strong>
                            </p>

                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover rounded mt-2">
                            @endif

                            <div class="mt-4">
                                <button class="add-to-cart bg-blue-500 text-white px-3 py-2 rounded"
                                    data-id="{{ $product->id }}">Add to Cart</button>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-3 text-center">No products found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.add-to-cart').on('click', function() {
                    let id = $(this).data('id');
                    $.post('{{ route('cart.add') }}', {
                        product_id: id,
                        _token: '{{ csrf_token() }}'
                    }, function(response) {
                        alert('Product added to cart!');
                    }).fail(function() {
                        alert('Something went wrong. Try again.');
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
