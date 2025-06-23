{{-- @extends('layout.app')

@section('content') --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                {{-- <h2>Edit Post</h2> --}}
                <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label>Title</label>
                        <input name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Post Type</label>
                        <select name="type_id" class="form-control" required>
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('type_id', $post->type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Content</label>
                        <textarea name="content" class="form-control">{{ $post->content }}</textarea>
                    </div>
                    @if (!empty($post->images) && is_array($post->images))
                        @foreach ($post->images as $image)
                            <img src="{{ asset('uploads/' . $image) }}" width="100" class="mb-2 me-2"
                                style="object-fit:cover; border-radius:6px;">
                        @endforeach
                    @endif

                    <div class="mb-3">
                        <label>Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>
                    <div id="preview-container" class="d-flex flex-wrap mt-2"></div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('images').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = ''; // clear previous previews

            const files = e.target.files;

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = "me-2 mb-2";
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.border = '1px solid #ddd';
                    img.style.borderRadius = '6px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
{{-- @endsection --}}
</x-app-layout>
