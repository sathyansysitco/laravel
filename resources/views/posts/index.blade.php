<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h2>Posts</h2>
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Add Post</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="GET" action="{{ route('posts.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search posts...">
                        <button class="btn btn-outline-primary">Search</button>
                    </div>
                </form>

                <div id="posts-data">
                    @include('posts.partials.table')
                </div>

                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>

            </div>
        </div>
    </div>
    <div id="loader" class="text-center my-3" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let timer = null;
            $('input[name="search"]').on('keyup', function() {
                clearTimeout(timer);
                const query = $(this).val();

                timer = setTimeout(() => {
                    $('#loader').show(); // 👈 Show loader

                    $.ajax({
                        url: "{{ route('posts.index') }}",
                        method: 'GET',
                        data: {
                            search: query
                        },
                        success: function(response) {
                            $('#posts-data').html(response);
                        },
                        complete: function() {
                            $('#loader').hide(); // 👈 Hide loader after request completes
                        }
                    });
                }, 300);
            });
        </script>
        <script>
            $('input[name="search"]').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('posts.index') }}",
                    method: 'GET',
                    data: {
                        search: query
                    },
                    success: function(response) {
                        $('#posts-data').html(response);
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
