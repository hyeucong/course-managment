<div>
    <flux:modal name="course-create" class="w-fit">
        <div class="space-y-6">

            <flux:fieldset>
                <flux:legend size="lg">Create a course</flux:legend>
                <div class="space-y-6">
                    <flux:input wire:model="course_name" label="Course name" placeholder="Course name" />
                    <flux:input wire:model="course_code" label="Course code" placeholder="Course code" />

                    <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                        <flux:input wire:model="lecturer" label="Lecturer" placeholder="Lecturer" />
                        <flux:input wire:model="lecturer" label="Lecturer" placeholder="Lecturer" />
                    </div>
                    <flux:textarea wire:model="description" label="Your description" placeholder="Your description" />
                </div>

                <div class="flex mt-6">
                    <flux:spacer />
                    <flux:button wire:listen="course-created" type="submit" variant="primary" wire:click="submit"
                        class="cursor-pointer">Create Course</flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
