<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Admin - Products</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</a>

        <table class="w-full mt-4 table-auto">
            <thead>
                <tr><th>Name</th><th>Price</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b">
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600" onclick="return confirm('Delete this?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</x-app-layout>
