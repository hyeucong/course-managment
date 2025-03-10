<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LectureSpace</title>
        <!-- Styles / Scripts -->
        @include('partials.head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col">
        <header class="w-full text-sm mb-12 not-has-[nav]:hidden flex justify-between items-center p-8">
            <nav class="text-[#1b1b18] dark:text-white font-bold text-2xl">lecturespace</nav>
            <nav class="space-x-6 font-bold hidden lg:flex">
                <a href="/" class="hover:text-gray-600 dark:hover:text-gray-300">Product</a>
                <a href="#" class="hover:text-gray-600 dark:hover:text-gray-300">Pricing</a>
            </nav>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>
                    @endauth
                </nav>
            @endif
        </header>


        <main class="mx-auto w-full p-8">
            <section>
                <x-layouts.client.hero />
            </section>
        </main>

        <footer>
            <x-layouts.client.footer />
        </footer>
    </body>

</html>
