<x-layouts.app title="Courses">
    <div class="relative w-full p-6">
        <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Archived Course</flux:heading>

        <livewire:course.course-create />
    </div>
    <flux:separator variant="primary" />
    <div class="relative w-full p-6">
        <livewire:archived />
    </div>

</x-layouts.app>
