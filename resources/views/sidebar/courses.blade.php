<x-layouts.app title="Courses">
    <div class="relative mb-6 w-full p-6">
        <div class="flex gap-4 justify-between">
            <flux:heading size="xl" level="1">Courses</flux:heading>

            <div class="flex gap-4">
                <div class="w-80">
                    <flux:input icon="magnifying-glass" placeholder="Filter by..." />
                </div>
                <flux:modal.trigger name="course-create">
                    <flux:button variant="primary" class="cursor-pointer">
                        {{ __('Create Course') }}
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        <livewire:course.course-create />

        <flux:subheading size="lg" class="mb-6">{{ __('Manage your courses and account settings') }}</flux:subheading>
        <flux:separator variant="subtle" />

        <livewire:courses />
    </div>

</x-layouts.app>
