@livewireStyles
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs" defer></script>

    @stack('scripts')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @auth
            @include('layouts.navigation')
        @endauth

        <!-- Page Heading -->
        {{-- auth user header --}}
        @auth
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
        @endauth
        {{-- guest header --}}

        @guest
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Shop</h1>
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium underline">
                        Login
                    </a>
                </div>
            </header>
        @endguest

        <!-- Page Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Wrapper for sidebar and content -->
                <div class="flex gap-6">
                    @auth
                        <!-- Sidebar -->
                        <aside id="sidebar"
                            class="w-64 bg-black text-white p-4 rounded shadow hidden lg:block transition-all duration-300">
                            <h2 class="text-xl font-semibold mb-4">Menu</h2>
                            <ul class="space-y-2">
                                <li><a href="{{ route('dashboard') }}" class="block hover:text-yellow-400">Dashboard</a>
                                </li>
                                <li><a href="{{ route('posts.index') }}" class="block hover:text-yellow-400">Posts</a></li>
                                <li><a href="{{ url('products') }}" class="block hover:text-yellow-400">Products</a>
                                </li>
                            </ul>
                        </aside>
                    @endauth

                    <!-- Main Content -->
                    <div class="flex-1">
                        @auth
                            <!-- Toggle button (only for small screens) -->
                            <button id="toggleSidebar" class="lg:hidden mb-4 px-4 py-2 bg-gray-800 text-white rounded">
                                ☰ Menu
                            </button>
                        @endauth

                        {{ $slot }}
                    </div>
                </div>

            </div>
        </main>


    </div>
    <div x-data="{ show: false, message: '' }" x-show="show" x-transition x-cloak x-init="$watch('show', value => value && setTimeout(() => show = false, 3000))"
        x-on:toast.window="
        message = $event.detail.message;
        show = true;
    "
        class="fixed bottom-5 right-5 bg-green-600 text-white px-4 py-2 rounded shadow-lg">
        <p x-text="message"></p>
    </div>

</body>

</html>
@livewireStyles
