<div class="relative w-full">
    @if(request()->routeIs('student.classwork'))
        <x-student-header :course="$course" :activeTab="$activeTab" />
    @else
        <x-course-header :course="$course" :activeTab="$activeTab" />
    @endif

    <div class="p-6 max-w-7xl mx-auto">
        @if (request()->routeIs('student.classwork'))

        @else
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <flux:heading size="xl" level="1" class="mb-2">Classwork</flux:heading>
                    <flux:subheading size="lg" class="text-neutral-600 dark:text-neutral-400">
                        Manage assignments and classwork for this course.
                    </flux:subheading>
                </div>
                <flux:modal.trigger name="create-classwork">
                    <flux:button variant="primary">
                        <div class="flex items-center gap-2">
                            <flux:icon.plus-circle variant="mini" class="size-4" />
                            <span>Create</span>
                        </div>
                    </flux:button>
                </flux:modal.trigger>
            </div>
        @endif

        <div class="space-y-4">
            @forelse($classworks as $classwork)
                <div class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden hover:shadow-md transition-shadow cursor-pointer"
                    wire:click="openClassworkDetails({{ $classwork->id }})">
                    <div class="p-6">
                        <div class="flex items-center justify-between gap-4 ">
                            <div class="flex items-start gap-4 flex-grow">
                                <div class="p-3 bg-neutral-100 dark:bg-neutral-700 rounded-xl">
                                    <flux:icon.document-text class="size-6 text-neutral-500 dark:text-neutral-400" />
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">
                                        {{ $classwork->title }}
                                    </h3>
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">
                                        {{ Str::limit($classwork->description, 100) }}
                                    </p>

                                </div>
                            </div>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                                Due {{ \Carbon\Carbon::parse($classwork->due_date)->format('M d, H:i A') }}
                            </p>
                            @if (request()->routeIs('student.classwork'))

                            @else
                                <flux:dropdown position="bottom" align="end">
                                    <flux:button variant="ghost">
                                        <flux:icon.ellipsis-vertical />
                                    </flux:button>
                                    <flux:navmenu>
                                        <flux:navmenu.item icon="pencil" wire:click="editClasswork({{ $classwork->id }})">Edit
                                        </flux:navmenu.item>
                                        <flux:navmenu.item icon="trash" variant="danger"
                                            wire:click="deleteClasswork({{ $classwork->id }})">Delete</flux:navmenu.item>
                                    </flux:navmenu>
                                </flux:dropdown>
                            @endif
                        </div>
                        <div class="flex flex-wrap items-center gap-3 mt-3">
                            <div class="flex gap-2">
                                <flux:badge color="primary">{{ $classwork->points }} points</flux:badge>
                                <flux:badge color="secondary">Assignment</flux:badge>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
                    <div class="p-6 text-center">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <div class="p-4 rounded-full bg-neutral-100 dark:bg-neutral-800">
                                <flux:icon.document-text class="size-8 text-neutral-400 dark:text-neutral-500" />
                            </div>
                            <div class="text-lg font-medium text-neutral-900 dark:text-neutral-100">
                                No assignments found
                            </div>
                            <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                Create an assignment to get started
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Create Classwork Modal -->
    <flux:modal name="create-classwork" class="md:w-[500px]">
        <form wire:submit.prevent="createClasswork">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Create</flux:heading>
                </div>

                <div class="space-y-4">
                    <flux:input type="text" label="Title" wire:model="title" placeholder="Enter assignment title" />

                    <flux:textarea label="Description" wire:model="description"
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
