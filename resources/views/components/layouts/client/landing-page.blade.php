<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LectureSpace</title>
        <!-- Styles / Scripts -->
        @include('partials.head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gradient-to-b from-[#FDFDFC] to-[#F8F8F6] text-[#1b1b18] min-h-screen flex flex-col">
        <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 mb-8 md:mb-12">
            <div class="flex justify-between items-center">
                <nav class="text-[#1b1b18] font-bold text-xl sm:text-2xl">
                    <a href="/" class="flex items-center">
                        <span class="text-green-800">lecture</span><span>space</span>
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button type="button" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop navigation -->
                <nav class="space-x-6 font-medium hidden lg:flex items-center">
                    <a href="#" class="hover:text-green-800 transition-colors duration-300">Pricing</a>
                    @if (Route::has('login'))
                        @auth
                            <flux:button>
                                <a href="{{ url('/courses') }}" class="py-2">
                                    Dashboard
                                </a>
                            </flux:button>

                        @else
                            <flux:button>
                                <a href="{{ route('login') }}" class="py-2 ">
                                    Log in
                                </a>
                            </flux:button>
                        @endauth
                    @endif
                </nav>
            </div>

            <!-- Mobile navigation (hidden by default) -->
            <div class="hidden lg:hidden mt-4 pb-3 border-b border-gray-200">
                <nav class="flex flex-col space-y-4 font-medium">
                    <a href="#" class="hover:text-green-800 transition-colors duration-300">Pricing</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/courses') }}" class="hover:text-green-800 transition-colors duration-300">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-block mt-2 px-5 py-2 border border-transparent rounded-md bg-white text-green-800 shadow-sm hover:bg-gray-50 transition-colors duration-300">
                                Log in
                            </a>
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <main class="flex-grow">
            <x-layouts.client.hero />
            <flux:separator />
            <x-layouts.client.problem />
            <x-layouts.client.review />
            <x-layouts.client.product />
            <x-layouts.client.pricing />
        </main>

        <footer>
            <flux:separator />
            <x-layouts.client.footer />
        </footer>
    </body>

</html>
