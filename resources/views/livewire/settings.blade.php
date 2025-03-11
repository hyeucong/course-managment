<div class="relative mb-6 w-full" x-data="{ activeTab: 'details' }">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex">
            <div class="mr-10 w-full pb-4 md:w-[220px]">
                <flux:navlist>
                    <flux:navlist.item @click="activeTab='details'">Edit
                    </flux:navlist.item>
                    <flux:navlist.item @click="activeTab='appearance'">Appearance
                    </flux:navlist.item>
                </flux:navlist>
            </div>

            <div>
                <div x-cloak x-show="activeTab === 'details'" class="w-full" wire:init="edit({{$course->id}})">
                    <div>
                        <flux:heading size="lg">Edit course</flux:heading>
                        <flux:subheading>Add detail for the course</flux:subheading>
                    </div>
                    <livewire:course.course-edit />
                    <div>
                        <flux:heading size="lg">Delete Course</flux:heading>
                        <flux:subheading class="mb-4">Delete this course</flux:subheading>
                        <div class="flex">
                            <flux:button wire:click="delete({{$course->id}})">Delete Course</flux:button>
                        </div>
                    </div>
                </div>

                <div x-cloak x-show="activeTab === 'appearance'">
                    <h2 class="text-2xl font-bold mb-4">Appearance Settings</h2>
                    <!-- Add your appearance settings form here -->
                    <p>Appearance settings content goes here.</p>
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
