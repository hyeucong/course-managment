<div class="flex items-start max-md:flex-col p-6">
    <flux:separator class="md:hidden" />

    <div class="flex-1 self-stretc">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
