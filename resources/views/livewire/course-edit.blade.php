<flux:modal name="edit-course" class="w-full" wire:cloak>
    <flux:fieldset>
        <flux:legend size="lg" class="text-center">Edit Class</flux:legend>
        <div class="space-y-6">
            <flux:input wire:model="course_name" label="Class name" placeholder="Class name" />
            <flux:input wire:model="course_code" label="Class code" placeholder="Class code" />

            <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                <flux:input wire:model="lecturer" label="Lecturer" placeholder="Lecturer" />
                <flux:input wire:model="room" label="Room" placeholder="Room" />
                <flux:input type="date" wire:model="date_start" label="Date Start" placeholder="Date Start" />
                <flux:input type="date" wire:model="date_end" label="Date End" placeholder="Date End" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <flux:select wire:model="schedule" label="Select Schedule">
                    <flux:select.option value="135">2 - 4 - 6</flux:select.option>
                    <flux:select.option value="246">3 - 5 - 7</flux:select.option>
                </flux:select>
                <flux:select wire:model="status" label="Status">
                    <flux:select.option value="active">Active</flux:select.option>
                    <flux:select.option value="inactive">Inactive</flux:select.option>
                    <flux:select.option value="archived" disabled>Archived</flux:select.option>
                </flux:select>
            </div>
            <flux:textarea wire:model="description" label="Your description" placeholder="Your description" />
        </div>

        <div class="flex justify-end mt-6">
            <flux:button wire:listen="course-edit" type="submit" variant="primary" wire:click="update"
                class="cursor-pointer">Save</flux:button>
        </div>
    </flux:fieldset>
</flux:modal>
