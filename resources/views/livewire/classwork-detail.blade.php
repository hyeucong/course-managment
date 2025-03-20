<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Classwork Header Section -->
        <div
            class="bg-white dark:bg-neutral-800 rounded-xl p-6 shadow-sm border border-neutral-200 dark:border-neutral-700">
            <h1 class="text-3xl font-bold">{{ $classwork->title }}</h1>
            <p class="mt-3 text-neutral-600 dark:text-neutral-400">{{ $classwork->description }}</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <flux:badge variant="primary" class="text-sm">{{ $classwork->points }} points</flux:badge>
                <flux:badge class="text-sm">Due {{ $classwork->due_date->format('M d, Y h:i A') }}</flux:badge>
            </div>
        </div>

        <!-- Submissions Section -->
        <div class="mt-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl">Student Submissions</h2>
                <div class="text-sm text-neutral-500 dark:text-neutral-400">
                    {{ $submissions->count() }} submissions
                </div>
            </div>

            @if($submissions->isEmpty())
                <div
                    class="bg-white dark:bg-neutral-800 rounded-xl p-8 text-center border border-neutral-200 dark:border-neutral-700">
                    <div class="p-4 rounded-full bg-neutral-100 dark:bg-neutral-700 inline-block mb-4">
                        <flux:icon.document-text class="w-8 h-8 text-neutral-400 dark:text-neutral-500" />
                    </div>
                    <h3 class="text-lg font-medium mb-2">No submissions yet</h3>
                    <p class="text-neutral-500 dark:text-neutral-400">Students haven't submitted any work for this
                        assignment.</p>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach ($submissions as $submission)
                        <div
                            class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm border border-neutral-200 dark:border-neutral-700 overflow-hidden">
                            <div class="flex justify-between items-center p-5 cursor-pointer"
                                wire:click="openGradingModal({{ $submission->student_id }})">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full mr-3 bg-neutral-100 dark:bg-neutral-700 flex items-center justify-center">
                                        <flux:icon.user class="w-6 h-6 text-neutral-500" />
                                    </div>
                                    <div>
                                        <div class="font-semibold">{{ $submission->student->first_name }}
                                            {{ $submission->student->last_name }}
                                        </div>
                                        <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                            Submitted: {{ $submission->created_at->format('M d, Y h:i A') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <flux:modal wire:model="showGradingModal" title="Grade Submission" max-width="xl">
        @if($currentSubmission)
            <div class="p-6 space-y-6">
                <div
                    class="flex flex-col  justify-between items-start gap-4 pb-4 border-b border-neutral-200 dark:border-neutral-700">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <div
                            class="w-12 h-12 rounded-full mr-4 bg-neutral-100 dark:bg-neutral-700 flex items-center justify-center">
                            <flux:icon.user class="w-6 h-6 text-neutral-500" />
                        </div>
                        <div>
                            <div class="font-semibold text-lg">
                                {{ $currentSubmission->student->first_name }} {{ $currentSubmission->student->last_name }}
                            </div>
                            <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                Submitted: {{ $currentSubmission->created_at->format('M d, Y h:i A') }}
                            </div>
                        </div>
                    </div>
                    <flux:badge color="primary" class="text-sm">
                        Grade: {{ $grades[(string) $currentStudentId] ?? 0 }} / {{ $classwork->points }}
                    </flux:badge>
                </div>

                <div class="space-y-4">
                    <div
                        class="prose dark:prose-invert max-w-none text-sm max-h-60 overflow-y-auto p-4 bg-neutral-50 dark:bg-neutral-900 rounded-lg border border-neutral-200 dark:border-neutral-700">
                        <p>{{ $currentSubmission->content }}</p>
                    </div>
                </div>

                <form wire:submit.prevent="saveGrade" class="space-y-4">
                    <div>
                        <label for="grade"
                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Grade</label>
                        <div class="flex items-center gap-2">
                            <flux:input id="grade" type="number" wire:model.live="grades.{{ $currentStudentId }}" min="0"
                                max="{{ $classwork->points }}" class="w-24" placeholder="0" />
                        </div>
                        @error("grades.{$currentStudentId}")
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-neutral-200 dark:border-neutral-700">
                        <flux:button type="submit" variant="primary">Save Grade</flux:button>
                    </div>
                </form>
            </div>
        @endif
    </flux:modal>
</div>
