<div>
    <flux:modal name="course-create" class="max-w-2xl w-full mx-auto">
        <div class="space-y-6">
            <flux:fieldset>
                <flux:legend size="lg" class="font-semibold text-center mb-4">New Course Registration</flux:legend>

                <div class="space-y-6">
                    <div class="space-y-4">
                        <flux:input wire:model="course_name" label="Course Title"
                            placeholder="Enter the full course title" />

                        <flux:input wire:model="course_code" label="Course Code" placeholder="e.g., CS101, MATH202" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 mt-2">
                        <flux:input wire:model="lecturer" label="Primary Instructor" placeholder="Instructor's name" />
                        <flux:input wire:model="room" label="Location" placeholder="Building and room number" />
                        <flux:input type="date" wire:model="date_start" label="Start Date" />
                        <flux:input type="date" wire:model="date_end" label="End Date" />
                    </div>

                    <flux:input wire:model="shedule" label="Meeting Schedule"
                        placeholder="e.g., Mon/Wed 10:00-11:30 AM" />

                    <flux:textarea wire:model="description" label="Course Description"
                        placeholder="Provide a brief overview of the course content, objectives, and learning outcomes"
                        rows="4" />
                </div>
                <div class="flex justify-end mt-8 space-x-3">
                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="submit"
                        class="cursor-pointer">
                        Create Course
                    </flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
