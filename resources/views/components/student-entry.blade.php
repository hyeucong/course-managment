<!DOCTYPE html>
<html>

    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-white">
        <flux:main>
            {{ $slot }}
        </flux:main>
    </body>
    @fluxScripts

</html>
