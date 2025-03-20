<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="mt-8">
            <h1 class="text-3xl font-bold">{{ $classwork->title }}</h1>
            <p class="mt-2 text-neutral-600 dark:text-neutral-400">{{ $classwork->description }}</p>
            <div class="mt-4 space-x-2">
                <flux:badge variant="primary">{{ $classwork->points }} points</flux:badge>
                <flux:badge>Due {{ $classwork->due_date->format('M d, Y H:i A') }}</flux:badge>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="font-semibold text-xl mb-4">Submissions</h2>
            <div class="space-y-4">
                @foreach ($submissions as $submission)
                    <div
                        class="p-5 border border-neutral-200 dark:border-neutral-700 rounded-xl bg-white dark:bg-neutral-800/50">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center">
                                <img src="{{ $submission->student->avatar }}" alt="{{ $submission->student->name }}"
                                    class="w-10 h-10 rounded-full mr-3 border border-neutral-200 dark:border-neutral-700">
                                <div>
                                    <div class="font-semibold">{{ $submission->student->name }}</div>
                                    <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                        Submitted: {{ $submission->created_at->format('M d, Y H:i A') }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if ($editingGrade === $submission->student_id)
                                    <form wire:submit.prevent="saveGrade({{ $submission->student_id }})">
                                        <flux:input type="number" wire:model="grades.{{ $submission->student_id }}" min="0"
                                            max="{{ $classwork->points }}" class="w-20 mr-2" />
                                        <flux:button type="submit" variant="primary" size="sm" class="mr-2">Save</flux:button>
                                        <flux:button wire:click="cancelEditGrade" size="sm">
                                            Cancel</flux:button>
                                    </form>
                                @else
                                    <p class="font-semibold mb-2">
                                        Grade: {{ $grades[$submission->student_id] ?? 'Not graded' }} / {{ $classwork->points }}
                                    </p>
                                    <flux:button wire:click="editGrade({{ $submission->student_id }})" variant="ghost" size="sm"
                                        class="border border-neutral-200 dark:border-neutral-700 rounded-lg">
                                        Edit Grade
                                    </flux:button>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4 prose dark:prose-invert max-w-none">
                            <p>{{ $submission->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
