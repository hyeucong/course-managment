<div class="relative mb-6 w-full">
    <div class="flex gap-4 justify-between">
        <flux:heading size="xl" level="1">{{$this->course->title}}</flux:heading>
        <div class="flex justify-end gap-4">
            <flux:button wire:click="delete({{$this->course->id}})">Delete</flux:button>
            <flux:button wire:click="edit({{$this->course->id}})" variant="primary">Edit</flux:button>
        </div>
    </div>

    <flux:subheading size="lg" class="mb-6">{{$this->course->description}}</flux:subheading>
    <flux:separator variant="subtle" />

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
