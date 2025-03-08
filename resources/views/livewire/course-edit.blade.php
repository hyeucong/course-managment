<div>
    <flux:modal name="edit-course" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit course</flux:heading>
                <flux:subheading>Add detail for the course</flux:subheading>
            </div>

            <flux:input wire:model="title" label="Title" placeholder="Your title" />
            <flux:textarea wire:model="description" label="Description" placeholder="Your description" />

            <div class="flex">
                <flux:spacer />
                <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="update"
                    class="cursor-pointer">Save
                    Course</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
