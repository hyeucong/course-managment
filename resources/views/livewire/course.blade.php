<div class="relative mb-6 w-full">
    <x-layouts.app.course-header :course="$this->course" />

    <div class="p-6">
        <div class="flex gap-4 justify-between">
            <flux:heading size="xl" level="1">{{$this->course->course_name}}</flux:heading>
            <div class="flex justify-end gap-4">
                <flux:button wire:click="delete({{$this->course->id}})">Delete</flux:button>
                <flux:button wire:click="edit({{$this->course->id}})" variant="primary">Edit</flux:button>
            </div>
        </div>

        <flux:subheading size="lg" class="mb-6">{{$this->course->course_code}}</flux:subheading>
        <flux:separator class="mb-6" variant="subtle" />

        <flux:subheading size="xl" class="mb-6">🎉 Congratulations, you've got a place to store files!</flux:subheading>

        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <a class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                        flex flex-col justify-between p-5">
                <div class="">
                    <h1 class="font-bold text-2xl mb-4">Student Enrolled</h1>
                    <p>{{$total}}</p>
                </div>
            </a>
        </div>

        <livewire:course-edit />

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

                    <flux:button type="submit" variant="danger" wire:click="destroy()">Delete Course</flux:button>
                </div>
            </div>
        </flux:modal>
    </div>
</div>
