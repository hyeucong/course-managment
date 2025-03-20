<flux:modal name="edit-student" class="md:w-96">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Update Student</flux:heading>
            <flux:subheading>Make changes to the student's details.</flux:subheading>
        </div>

        <flux:input wire:model="studentFirstName" label="First Name" placeholder="First Name" />
        <flux:input wire:model="studentLastName" label="Last Name" placeholder="Last Name" />
        <flux:input wire:model="studentEmail" label="Email" type="email" placeholder="Email" />

        <div class="flex">
            <flux:spacer />
            <flux:button wire:click="updateStudent" type="submit" variant="primary">Save changes
            </flux:button>
        </div>
    </div>
</flux:modal>
