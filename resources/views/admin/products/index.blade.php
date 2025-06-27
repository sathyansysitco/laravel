<x-app-layout>
     <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">Admin - Products</h2>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
                + Add Product
            </a>
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</a>

        <table class="w-full mt-4 table-auto">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b">
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="h-12">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                class="inline">
                                @csrf @method('DELETE')
                                <!-- Trigger -->
                                <button x-data
                                    @click.prevent="$dispatch('open-delete-modal', {
        url: '{{ route('admin.products.destroy', $product) }}',
        name: '{{ $product->name }}'
    })"
                                    class="text-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">No products found.</td>
                    </tr>
                @endforelse
            </tbody>

            </tbody>
        </table>

        {{ $products->links() }}
    </div>
    <div 
    x-data="{ show: false, url: '', name: '' }" 
    x-on:open-delete-modal.window="
        show = true; 
        url = $event.detail.url;
        name = $event.detail.name;
    " 
    x-show="show"
    class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
>
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md" @click.outside="show = false">
        <h2 class="text-lg font-semibold mb-4 text-gray-800">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete <strong x-text="name"></strong>?</p>

        <form :action="url" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end space-x-3">
                <button type="button" @click="show = false" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
            </div>
        </form>
    </div>
</div>

</x-app-layout>
