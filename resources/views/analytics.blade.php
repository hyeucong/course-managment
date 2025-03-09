<x-layouts.app title="Analytics">
    <div class="relative mb-6 w-full">
        <div class="flex gap-4 justify-between">
            <flux:heading size="xl" level="1">Courses</flux:heading>

            <flux:modal.trigger name="course-create">
                <flux:button variant="primary" class="cursor-pointer">
                    {{ __('Create Course') }}
                </flux:button>
            </flux:modal.trigger>
        </div>

        <livewire:course-create />
        <livewire:course-edit />

        <flux:subheading size="lg" class="mb-6">{{ __('Manage your courses and account settings') }}</flux:subheading>
        <flux:separator variant="subtle" />

        <livewire:courses />
    </div>

</x-layouts.app>
