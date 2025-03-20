<flux:modal name="edit-post" class="md:w-[500px]">
    <form wire:submit.prevent="updatePost">
        <flux:fieldset>
            <flux:legend size="lg">Edit Announcement</flux:legend>
            <flux:textarea wire:model="editPostContent" placeholder="Edit your announcement..." rows="5" />
            <flux:input wire:model="editPostUrl" placeholder="Edit attached URL" class="mt-2" />
            <div class="flex justify-end mt-4 space-x-2">
                <flux:button type="submit" variant="primary">Update</flux:button>
            </div>
        </flux:fieldset>
    </form>
</flux:modal>
