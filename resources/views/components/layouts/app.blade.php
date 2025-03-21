<x-layouts.app.sidebar :title="$title ?? 'lecturespace'">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
