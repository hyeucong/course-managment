<flux:modal wire:model="showGradingModal" title="Grade Submission" class="min-w-[500px]">
    @if($currentSubmission)
        <div class="space-y-6">
            <div class="flex items-center justify-between border-gray-200">
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
            <flux:separator variant="subtle" />
            <div class="space-y-4">
                <flux:badge color="lime">Student Answer</flux:badge>
                <flux:textarea resize="none" rows="auto" readonly variant="filled">
                    {{ $currentSubmission->content }}
                </flux:textarea>
            </div>
            <flux:separator variant="subtle" />
            <form wire:submit.prevent="saveGrade" class="space-y-4">
                <div>
                    <flux:input.group>
                        <flux:input.group.prefix>Grade: {{ $grades[(string) $currentStudentId] ?? 0 }} /
                            {{ $classwork->points }}
                        </flux:input.group.prefix>

                        <flux:input id="grade" type="number" wire:model="grades.{{ $currentStudentId }}" min="0"
                            max="{{ $classwork->points }}" class="w-24" placeholder="0" />
                    </flux:input.group>
                    @error("grades.{$currentStudentId}")
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <flux:separator variant="subtle" />
                <div class="flex justify-end gap-3 pt-4">
                    <flux:button type="submit" variant="primary">Save</flux:button>
                </div>
            </form>
        </div>
    @endif
</flux:modal>
