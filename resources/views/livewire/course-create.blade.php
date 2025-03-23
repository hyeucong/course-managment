<div>
    <flux:modal name="course-create" class="max-w-xl w-full mx-auto">
        <div class="space-y-4">
            <flux:fieldset>
                <flux:legend size="lg" class="font-semibold text-center mb-4">Create New Course</flux:legend>

                <div class="space-y-4">
                    <flux:input wire:model="course_name" label="Title" placeholder="Enter course title" />
                    <flux:input wire:model="course_code" label="Code" placeholder="e.g., CS101" />
                    <div class="grid grid-cols-2 gap-4">
                        <flux:input badge="Optional" wire:model="lecturer" label="Instructor"
                            placeholder="Instructor's name" />
                        <flux:input badge="Optional" wire:model="room" label="Room"
                            placeholder="Enter room number or name" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <flux:select wire:model="schedule" label="Select Schedule">
                            <flux:select.option value="">Select schedule</flux:select.option>
                            <flux:select.option value="135">2 - 4 - 6</flux:select.option>
                            <flux:select.option value="246">3 - 5 - 7</flux:select.option>
                        </flux:select>
                        <flux:select wire:model="status" label="Status">
                            <flux:select.option value="">Select status</flux:select.option>
                            <flux:select.option value="active">Active</flux:select.option>
                            <flux:select.option value="inactive">Inactive</flux:select.option>
                        </flux:select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <flux:input type="date" wire:model="date_start" label="Start Date" />
                        <flux:input type="date" wire:model="date_end" label="End Date" />
                    </div>
                    <flux:textarea badge="Optional" wire:model="description" label="Description"
                        placeholder="Brief class overview" rows="3" />
                </div>
                <div class="flex justify-end mt-6 space-x-3">
                    <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="submit">
                        Create
                    </flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
