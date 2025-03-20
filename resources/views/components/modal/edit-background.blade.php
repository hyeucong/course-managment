<flux:modal name="edit-background" class="md:max-w-md">
    <form wire:submit.prevent="updateBackgroundUrl">
        <div class="space-y-4">
            <flux:heading size="lg">Edit Course Banner</flux:heading>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                Choose a new banner image for your course.
            </p>

            <div class="space-y-6">
                <flux:input type="url" wire:model="backgroundUrl" label="Image URL" placeholder="Paste an image URL" />
            </div>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </div>
    </form>
</flux:modal>
