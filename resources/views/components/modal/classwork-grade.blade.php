<flux:modal wire:model="showGradingModal" title="Grade Submission" class="min-w-[500px]">
    @if($currentSubmission)
        <div class="space-y-6">
            <div class="flex items-center justify-between pb-4  border-gray-200">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full mr-4 bg-gray-100 flex items-center justify-center">
                        <flux:icon.user class="w-6 h-6 text-gray-500" />
                    </div>
                    <div>
                        <div class="font-semibold text-lg">
                            {{ $currentSubmission->student->first_name }} {{ $currentSubmission->student->last_name }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $currentSubmission->created_at->format('M d, Y h:i A') }}
                        </div>
                    </div>
                </div>
            </div>
            <flux:badge color="primary" class="text-sm">
                Grade: {{ $grades[(string) $currentStudentId] ?? 0 }} / {{ $classwork->points }}
            </flux:badge>
            <div class="space-y-4">
                <div class="text-sm max-h-60 overflow-y-auto p-4 bg-gray-50 rounded-lg ">
                    <p>{{ $currentSubmission->content }}</p>
                </div>
            </div>

            <form wire:submit.prevent="saveGrade" class="space-y-4">
                <div>
                    <div class="flex items-center gap-2">
                        <flux:input id="grade" type="number" wire:model="grades.{{ $currentStudentId }}" min="0"
                            max="{{ $classwork->points }}" class="w-24" placeholder="0" />
                    </div>
                    @error("grades.{$currentStudentId}")
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <flux:button type="submit" variant="primary">Save</flux:button>
                </div>
            </form>
        </div>
    @endif
</flux:modal>
