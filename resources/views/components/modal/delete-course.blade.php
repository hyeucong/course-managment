<flux:modal name="delete-course" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Delete Class?</flux:heading>
            <flux:subheading>
                <p>You're about to delete this Class.</p>
                <p>This action cannot be reversed.</p>
            </flux:subheading>
        </div>
        <div class="flex gap-2">
            <flux:spacer />
            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>
            <flux:button type="submit" variant="danger" wire:click="destroy()">Delete Class
            </flux:button>
        </div>
    </div>
</flux:modal>
