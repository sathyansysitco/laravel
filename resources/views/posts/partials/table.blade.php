<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Images</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 100) }}</td>
                <td>
                    @if (!empty($post->images) && is_array($post->images))
                        <div class="d-flex flex-wrap">
                            @foreach ($post->images as $image)
                                <img src="{{ asset('uploads/' . $image) }}" width="80" height="80"
                                    class="me-2 mb-2 rounded border" style="object-fit:cover;">
                            @endforeach
                        </div>
                    @else
                        <span class="text-muted">No Images</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-info">
                        {{ $post->type->name ?? 'N/A' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $posts->links() !!}
</div>
