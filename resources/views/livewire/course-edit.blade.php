<div name="edit-course" class="w-lg mb-6">
    <div class="space-y-6">
        <flux:input wire:model="course_name" label="Course name" placeholder="Course name" />
        <flux:input wire:model="course_code" label="Course code" placeholder="Course code" />
        <flux:input wire:model="lecturer" label="Lecturer" placeholder="Lecturer" />
        <flux:textarea wire:model="description" label="Your description" placeholder="Your description" />

        <div class="flex">
            <flux:button wire:listen="course-edit" type="submit" variant="primary" wire:click="update"
                class="cursor-pointer">Save</flux:button>
            <flux:spacer />
        </div>
    </div>
</div>
