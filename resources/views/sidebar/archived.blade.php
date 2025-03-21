<x-layouts.app title="Courses">
    <div class="relative w-full p-6">
        <div class="flex flex-wrap gap-4 justify-between">
            <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Archived Course</flux:heading>
        </div>

        <livewire:course.course-create />
    </div>
    <flux:separator variant="subtle" />
    <div class="relative w-full p-6">
        <livewire:courses />
    </div>

</x-layouts.app>
