<div>
    <flux:modal name="course-create" class="max-w-xl w-full mx-auto">
        <div class="space-y-4">
            <flux:fieldset>
                <flux:legend size="lg" class="font-semibold text-center mb-4">New Course</flux:legend>

                <div class="space-y-4">
                    <flux:input wire:model="course_name" label="Course Title" placeholder="Enter course title" />
                    <flux:input wire:model="course_code" label="Course Code" placeholder="e.g., CS101" />
                    <flux:input wire:model="lecturer" label="Instructor" placeholder="Instructor's name" />
                    <div class="grid grid-cols-2 gap-4">
                        <flux:input type="date" wire:model="date_start" label="Start Date" />
                        <flux:input type="date" wire:model="date_end" label="End Date" />
                    </div>
                    <flux:textarea wire:model="description" label="Description" placeholder="Brief course overview"
                        rows="3" />
                </div>
                <div class="flex justify-end mt-6 space-x-3">
                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="submit">
                        Create
                    </flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
