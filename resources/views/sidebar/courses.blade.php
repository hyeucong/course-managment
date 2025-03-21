<x-layouts.app title="Courses">
    <div class="relative w-full p-6">
        <div class="flex flex-wrap gap-4 justify-between items-center">
            <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Lecture Space</flux:heading>

            <div class="flex gap-4">
                <div class="w-80">
                    <flux:input icon="magnifying-glass" placeholder="Filter course name or code..." />
                </div>
                <flux:modal.trigger name="course-create">
                    <flux:button variant="primary" class="cursor-pointer">
                        Create Course
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        <livewire:course.course-create />
    </div>
    <flux:separator variant="subtle" />
    <div class="relative w-full p-6">
        <livewire:courses />
    </div>

</x-layouts.app>
