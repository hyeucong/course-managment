<flux:modal name="create-classwork" class="md:w-[500px]">
    <form wire:submit.prevent="createClasswork">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:input type="text" label="Title" wire:model="title" placeholder="Enter assignment title" />

                <flux:textarea label="Description" wire:model="description" placeholder="Provide detailed description"
                    rows="4" />

                <div class="grid grid-cols-2 gap-4">
                    <flux:input type="number" label="Points" wire:model="points" placeholder="100" />
                    <flux:input type="datetime-local" label="Due Date" wire:model="dueDate" />
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <flux:button type="submit" variant="primary">Create</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
