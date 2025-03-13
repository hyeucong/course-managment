<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 space-y-8">
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Teachers</h2>
                <flux:modal.trigger name="add-teacher">
                    <flux:button>Add Teacher</flux:button>
                </flux:modal.trigger>
            </div>

            <div class="space-y-2">
                <div
                    class="flex items-center justify-between p-4 rounded-lg border border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center gap-4">
                        <flux:icon.user class="w-8 h-8" />
                        <div>
                            <p class="font-medium">John Doe</p>
                            <p class="text-sm text-zinc-500">john.doe@example.com</p>
                        </div>
                    </div>
                    <flux:dropdown position="bottom" align="start">
                        <flux:button variant="ghost">
                            <flux:icon.ellipsis-vertical />
                        </flux:button>
                        <flux:menu>
                            <flux:menu.item icon="trash" variant="danger" kbd="⌘⌫">Delete</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Students</h2>
                <flux:modal.trigger name="student-create">
                    <flux:button>Add Student</flux:button>
                </flux:modal.trigger>
            </div>

            <livewire:people.student-create />
            <livewire:people.add-teacher />

            <div class="space-y-2">
                @foreach($students as $student)
                    <div
                        class="flex items-center justify-between p-4 rounded-lg border border-neutral-200 dark:border-neutral-700">
                        <div class="flex items-center gap-4">
                            <flux:icon.user class="w-8 h-8" />
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
                                <flux:menu.item icon="trash" variant="danger" kbd="⌘⌫">Delete</flux:menu.item>
                            </flux:menu>
                        </flux:dropdown>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
