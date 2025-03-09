<div>
    <flux:modal name="course-create" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create a course</flux:heading>
                <flux:subheading>Add detail for the course</flux:subheading>
            </div>

            <flux:input wire:model="title" label="Title" placeholder="Your title" />
            <flux:textarea wire:model="description" label="Description" placeholder="Your description" />

            <div class="flex">
                <flux:spacer />
                <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="submit"
                    class="cursor-pointer">Create Course</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
