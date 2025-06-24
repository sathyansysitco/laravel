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
                <div id="skeleton-loader" class="mb-3" style="display: none;">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="d-flex justify-content-between align-items-center p-2 border-bottom">
                            <div class="skeleton w-25"></div>
                            <div class="skeleton w-50"></div>
                            <div class="skeleton w-25"></div>
                        </div>
                    @endfor
                </div>


                <div id="posts-data">
                    @include('posts.partials.table')
                </div>

                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {

                let timer = null;

                $('input[name="search"]').on('keyup', function() {
                    clearTimeout(timer);

                    let query = $(this).val();

                    timer = setTimeout(() => {
                        $('#skeleton-loader').show();
                        $('#posts-data').hide();

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
                                $('#skeleton-loader').hide();
                                $('#posts-data').show();
                            }
                        });
                    }, 300);
                });
            });
        </script>
    @endpush
    @push('styles')
        <style>
            .skeleton {
                height: 20px;
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: shimmer 1.2s infinite linear;
                border-radius: 4px;
            }

            @keyframes shimmer {
                0% {
                    background-position: -200% 0;
                }

                100% {
                    background-position: 200% 0;
                }
            }
        </style>
    @endpush

</x-app-layout>
