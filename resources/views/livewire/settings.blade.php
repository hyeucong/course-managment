<div class="relative w-full" x-data="{ activeTab: 'details' }">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between">
            <div>
                <flux:heading size="xl" level="1">Settings</flux:heading>
                <flux:subheading size="lg" class="mb-6">Configure the settings for this classes</flux:subheading>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 md:max-w-3xl">
            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
                <div class="w-full" wire:init="edit({{$course->id}})">
                    <livewire:course.course-edit />
                </div>
            </div>

            <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
                <div class="w-full" wire:init="edit({{$course->id}})">
                    <div>
                        <flux:heading size="lg">Delete Course</flux:heading>
                        <flux:subheading class="mb-4">The following actions are destructive and cannot be reversed.
                        </flux:subheading>
                        <div class="flex">
                            <flux:button wire:click="delete({{$course->id}})">Delete Course</flux:button>
                        </div>
                    </div>
                </div>
            </div>

            <x-modal.delete-class />
        </div>
    </div>
</div>
