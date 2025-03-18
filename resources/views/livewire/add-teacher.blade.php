<div>
    <flux:modal name="add-teacher" class="w-fit">
        <div class="space-y-6">
            <flux:fieldset>
                <flux:legend size="lg">Add Teacher</flux:legend>
                <div class="space-y-6">
                    <flux:input type="email" wire:model="email" label="Email" placeholder="teacher@example.com" />
                </div>

                <div class="flex mt-6">
                    <flux:spacer />
                    <flux:button wire:click="addTeacher" type="submit" variant="primary" class="cursor-pointer">
                        Add Teacher
                    </flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
