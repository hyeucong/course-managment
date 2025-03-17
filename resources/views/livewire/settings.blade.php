<div class="relative mb-6 w-full" x-data="{ activeTab: 'details' }">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex justify-between">
            <div>
                <flux:heading size="xl" level="1">Settings</flux:heading>
                <flux:subheading size="lg" class="mb-6">Configure the settings for this classes</flux:subheading>
            </div>
        </div>

        <flux:separator class="mb-6" variant="subtle" />

        <div class="flex gap-5 flex-col w-fit">
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

            <flux:modal name="delete-course" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Delete Course?</flux:heading>

                        <flux:subheading>
                            <p>You're about to delete this Course.</p>
                            <p>This action cannot be reversed.</p>
                        </flux:subheading>
                    </div>

                    <div class="flex gap-2">
                        <flux:spacer />

                        <flux:modal.close>
                            <flux:button variant="ghost">Cancel</flux:button>
                        </flux:modal.close>

                        <flux:button type="submit" variant="danger" wire:click="destroy()">Delete Course
                        </flux:button>
                    </div>
                </div>
            </flux:modal>
        </div>
    </div>
</div>
