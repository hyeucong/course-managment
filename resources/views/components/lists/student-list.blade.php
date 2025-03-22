<div class="flex items-center justify-between p-4 rounded-lg border border-neutral-200 shadow-sm">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-full mr-4 bg-neutral-100 flex items-center justify-center">
            <flux:icon.user class="w-6 h-6 text-neutral-500" />
        </div>
        <div>
            <p class="font-medium">{{ $student->first_name }} {{$student->last_name}}</p>
            <p class="text-sm text-zinc-500">
                {{ $student->email }}
            </p>
        </div>
    </div>
    <flux:dropdown position="bottom" align="start">
        <flux:button variant="ghost">
            <flux:icon.ellipsis-vertical />
        </flux:button>
        <flux:menu>
            <flux:menu.item icon="user" wire:click="editStudent({{ $student->id }})">Edit
            </flux:menu.item>
            <flux:menu.item icon="minus-circle" variant="danger" wire:click="removeStudent({{ $student->id }})">Remove
            </flux:menu.item>
            <flux:modal.trigger name="delete-student">
                <flux:menu.item icon="backspace" variant="danger">
                    Delete
                </flux:menu.item>
            </flux:modal.trigger>
        </flux:menu>
    </flux:dropdown>
</div>
