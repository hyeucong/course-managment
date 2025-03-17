<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex justify-between mb-6">
            <flux:heading size="xl" level="1">Classwork</flux:heading>
            <flux:modal.trigger name="create-classwork">
                <flux:button variant="primary">
                    <div class="flex items-center gap-2">
                        <flux:icon.plus-circle />
                        Create
                    </div>
                </flux:button>
            </flux:modal.trigger>
        </div>

        <div class="space-y-4">
            @foreach($classworks as $classwork)
                <div
                    class="p-4 border border-neutral-200 dark:border-neutral-700 rounded-xl hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                    <div class="flex items-start gap-4">
                        <div class="p-2 border border-neutral-200 dark:border-neutral-700 rounded-xl">
                            <flux:icon.document-text />
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between">
                                <h3 class="font-semibold">{{ $classwork->title }}</h3>
                                <p class="text-sm text-neutral-600 dark:text-neutral-400">Due
                                    {{ \Carbon\Carbon::parse($classwork->due_date)->format('M d, H:i A') }}
                                </p>
                            </div>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">
                                {{ Str::limit($classwork->description, 100) }}
                            </p>
                            <div class="flex justify-between items-center mt-3">
                                <div class="flex gap-2">
                                    <flux:badge>{{ $classwork->points }} points</flux:badge>
                                    <flux:badge>Assignment</flux:badge>
                                </div>
                                <div class="flex gap-2">
                                    <flux:button wire:click="editClasswork({{ $classwork->id }})" size="sm">Edit
                                    </flux:button>
                                    <flux:button wire:click="deleteClasswork({{ $classwork->id }})" size="sm"
                                        variant="danger">Delete</flux:button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Create Classwork Modal -->
    <flux:modal name="create-classwork" class="md:w-[500px]">
        <form wire:submit.prevent="createClasswork">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Create Assignment</flux:heading>
                </div>

                <div class="space-y-4">
                    <flux:input type="text" label="Title" wire:model="title" placeholder="Enter assignment title" />

                    <flux:textarea label="description" wire:model="description"
                        placeholder="Provide detailed description" rows="4" />

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
</div>
