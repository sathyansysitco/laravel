<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-bold text-gray-800">Edit Product</h2></x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label>Price</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label>Image</label>
                <input type="file" name="image" class="border p-2 w-full">
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" class="h-16 rounded shadow">
                    </div>
                @endif
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
