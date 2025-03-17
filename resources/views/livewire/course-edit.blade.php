<div name="edit-course" class="w-lg">

    <flux:fieldset>
        <flux:legend size="lg">Create a course</flux:legend>
        <div class="space-y-6">
            <flux:input wire:model="course_name" label="Course name" placeholder="Course name" />
            <flux:input wire:model="course_code" label="Course code" placeholder="Course code" />

            <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                <flux:input wire:model="lecturer" label="Lecturer" placeholder="Lecturer" />
                <flux:input wire:model="room" label="Room" placeholder="Room" />
                <flux:input type="date" wire:model="date_start" label="Date Start" placeholder="Date Start" />
                <flux:input type="date" wire:model="date_end" label="Date End" placeholder="Date End" />
            </div>
            <flux:input wire:model="shedule" label="Schedule" placeholder="Schedule" />
            <flux:textarea wire:model="description" label="Your description" placeholder="Your description" />
        </div>

        <div class="flex mt-6">
            <flux:button wire:listen="course-edit" type="submit" variant="primary" wire:click="update"
                class="cursor-pointer">Save</flux:button>
            <flux:spacer />
        </div>
    </flux:fieldset>
</div>
