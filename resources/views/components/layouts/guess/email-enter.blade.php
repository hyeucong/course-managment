<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LectureSpace - Email Submission</title>
        <!-- Styles / Scripts -->
        @include('partials.head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-zinc-100 dark:bg-zinc-900">
        <main class="flex-grow flex items-center justify-center min-h-screen p-6">
            <div class="max-w-md w-full">
                <div
                    class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h1 class="text-2xl font-bold text-neutral-900 dark:text-neutral-100 mb-2">Welcome to
                            LectureSpace</h1>
                        <p class="text-neutral-600 dark:text-neutral-400 mb-6">Please enter your email to continue</p>

                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-4">
                                <flux:input type="email" name="email" id="email" placeholder="Enter your email" required
                                    class="w-full" />
                            </div>
                            <flux:button type="submit" variant="primary" class="w-full">
                                <div class="flex items-center justify-center gap-2">
                                    <span>Submit</span>
                                    <flux:icon.arrow-right variant="mini" class="size-4" />
                                </div>
                            </flux:button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>
