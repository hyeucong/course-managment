<div>
    <flux:modal name="add-teacher" class="w-full max-w-md mx-auto">
        <div class="space-y-6">
            <flux:fieldset>
                <flux:legend size="lg" class="text-center mb-4">Add Teacher</flux:legend>
                <div class="space-y-6">
                    <flux:input type="email" wire:model="email" label="Email" placeholder="teacher@example.com"
                        class="w-full" />
                </div>

                <div class="flex justify-end mt-6">
                    <flux:button wire:click="addTeacher" type="submit" variant="primary"
                        class="cursor-pointer w-full sm:w-auto">
                        Add Teacher
                    </flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
