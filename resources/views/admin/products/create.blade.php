<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-bold text-gray-800">Add Product</h2></x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label>Price</label>
                <input type="number" step="0.01" name="price" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label>Image</label>
                <input type="file" name="image" class="border p-2 w-full">
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
