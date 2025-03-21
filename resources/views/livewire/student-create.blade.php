<div>
    <flux:modal name="student-create" class="w-fit">
        <div class="space-y-6">

            <flux:fieldset>
                <flux:legend size="lg" class="text-center mb-4">Create Student</flux:legend>
                <div class="space-y-6">
                    <flux:input wire:model="first_name" label="First Name" placeholder="John" />
                    <flux:input wire:model="last_name" label="Last Name" placeholder="Doe" />

                    <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                        <flux:input type="email" wire:model="email" label="Email" placeholder="johndude123@gmail.com" />
                        <flux:input type="phone" wire:model="phone" label="Phone Number" placeholder="0123456789" />
                    </div>
                </div>

                <div class="flex mt-6">
                    <flux:spacer />
                    <flux:button wire:listen="student-created" type="submit" variant="primary" wire:click="submit"
                        class="cursor-pointer">Create Student</flux:button>
                </div>
            </flux:fieldset>
        </div>
    </flux:modal>
</div>
