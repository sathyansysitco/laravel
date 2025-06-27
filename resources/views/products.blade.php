<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop Products') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                    <div class="border rounded-lg shadow hover:shadow-xl transition bg-white flex flex-col">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="h-48 w-full object-cover rounded-t-lg">
                        @else
                            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                No Image
                            </div>
                        @endif

                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                                <p class="text-gray-700 mb-2">
                                    {{ Str::limit($product->description, 60) }}
                                </p>
                                <p class="text-lg text-green-600 font-bold">${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="mt-4">
                                <button
                                    class="add-to-cart w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                                    data-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500">No products found.</p>
                @endforelse
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const isLoggedIn = @json(Auth::check());

            $(document).ready(function() {
                $('.add-to-cart').on('click', function() {
                    let id = $(this).data('id');

                    if (!isLoggedIn) {
                        window.dispatchEvent(new CustomEvent('toast', {
                            detail: {
                                message: 'Please log in to add items to your cart.',
                                type: 'error'
                            }
                        }));
                        // Wait 1 second before redirecting to login
                        setTimeout(() => {
                            window.location.href = '{{ route('login') }}';
                        }, 3000);

                        return;
                    }

                    $.post(`/cart/add/${id}`, {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    }, function(response) {
                        window.dispatchEvent(new CustomEvent('toast', {
                            detail: {
                                message: 'Product added to cart!'
                            }
                        }));
                    }).fail(function() {
                        window.dispatchEvent(new CustomEvent('toast', {
                            detail: {
                                message: 'Something went wrong.'
                            }
                        }));
                    });

                });
            });
        </script>
    @endpush
</x-app-layout>
