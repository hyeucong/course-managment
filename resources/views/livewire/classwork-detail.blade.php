<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-neutral-200">
            <h1 class="text-3xl font-bold">{{ $classwork->title }}</h1>
            <p class="mt-3 text-neutral-600">{{ $classwork->description }}</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <flux:badge variant="primary" class="text-sm">{{ $classwork->points }} points</flux:badge>
                <flux:badge class="text-sm">Due {{ $classwork->due_date->format('M d, Y h:i A') }}</flux:badge>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl">Student Submissions</h2>
                <div class="text-sm text-neutral-500">
                    {{ $submissions->count() }} submissions
                </div>
            </div>

            @if($submissions->isEmpty())
                <div class="bg-white rounded-xl p-8 text-center border border-neutral-200">
                    <div class="p-4 rounded-full bg-neutral-100 inline-block mb-4">
                        <flux:icon.document-text class="w-8 h-8 text-neutral-400" />
                    </div>
                    <h3 class="text-lg font-medium mb-2">No submissions yet</h3>
                    <p class="text-neutral-500">Students haven't submitted any work for this
                        assignment.</p>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach ($submissions as $submission)
                        <div class="bg-white rounded-xl shadow-sm border border-neutral-200 overflow-hidden">
                            <div class="flex justify-between items-center p-5 cursor-pointer"
                                wire:click="openGradingModal({{ $submission->student_id }})">
                                <div class=" flex items-center">
                                    <div class="w-10 h-10 rounded-full mr-3 bg-neutral-100 flex items-center justify-center">
                                        <flux:icon.user class="w-6 h-6 text-neutral-500" />
                                    </div>
                                    <div>
                                        <div class="font-semibold">{{ $submission->student->first_name }}
                                            {{ $submission->student->last_name }}
                                        </div>
                                        <div class="text-sm text-neutral-500">
                                            {{ $submission->created_at->format('M d, Y h:i A') }}
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

    <x-modal.classwork-grade :classwork="$classwork" :submissions="$submissions" :show-grading-modal="$showGradingModal"
        :current-submission="$currentSubmission" :current-student-id="$currentStudentId" :grades="$grades" />
</div>
