<div class="flex items-center justify-between p-4 rounded-lg border border-neutral-200">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-full mr-4 bg-neutral-100 dark:bg-neutral-700 flex items-center justify-center">
            <flux:icon.user class="w-6 h-6 text-neutral-500" />
        </div>
        <div>
            <p class="font-medium">{{ $teacher->name }}</p>
            <p class="text-sm text-zinc-500">{{ $teacher->email }}</p>
        </div>
    </div>
    <flux:dropdown position="bottom" align="start">
        <flux:button variant="ghost">
            <flux:icon.ellipsis-vertical />
        </flux:button>
        <flux:menu>
            <flux:menu.item icon="trash" variant="danger" wire:click="removeTeacher({{ $teacher->id }})">Remove
            </flux:menu.item>
        </flux:menu>
    </flux:dropdown>

</div>
