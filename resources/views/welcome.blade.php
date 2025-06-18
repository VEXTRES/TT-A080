<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Header corregido -->
        <nav class="bg-black text-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ url('/nutricion') }}">
                                <img src="{{ asset('storage/photos/logo.jpg') }}" alt="logo" class="w-12 h-12 rounded-full">
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <a href="{{ url('/nutricion') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-white hover:text-cyan-400 transition duration-150 ease-in-out">
                                Nutrición
                            </a>
                            <a href="{{ url('/fitness') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-white hover:text-cyan-400 transition duration-150 ease-in-out">
                                Fitness
                            </a>
                            <a href="{{ url('/salud') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-white hover:text-cyan-400 transition duration-150 ease-in-out">
                                Salud
                            </a>
                            <a href="{{ url('/acerca') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-white hover:text-cyan-400 transition duration-150 ease-in-out">
                                Acerca de nosotros
                            </a>
                        </div>
                    </div>

                    <!-- Auth buttons -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        @if (Route::has('login'))
                            <div class="flex space-x-4">
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-cyan-400 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus-visible:ring-[#FF2D20] transition">
                                        Register
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-black text-white py-2 px-4 text-center text-sm">
            <p>&copy; 2024 Tu Sitio. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>
