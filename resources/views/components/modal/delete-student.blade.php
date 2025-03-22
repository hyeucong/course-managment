<flux:modal name="delete-student" class="md:w-96">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Delete Student</flux:heading>
            <flux:text class="mt-2">Are you sure you want to delete this student? This will remove them from
                all courses and cannot be undone.</flux:text>
        </div>
        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="danger" wire:click="deleteStudent({{ $student->id }})">
                Delete
            </flux:button>
        </div>
    </div>
</flux:modal>
