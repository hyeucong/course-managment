<div class="relative w-full">
    <x-student-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-neutral-200">
            <h1 class="text-3xl font-bold">{{ $classwork->title }}</h1>
            <p class="mt-3 text-neutral-600 dark:text-neutral-400">{{ $classwork->description }}</p>
            <div class="mt-4 flex flex-wrap gap-2">
                <flux:badge variant="primary" class="text-sm">{{ $classwork->points }} points</flux:badge>
                <flux:badge class="text-sm">Due {{ $classwork->due_date->format('M d, Y h:i A') }}</flux:badge>
            </div>
        </div>

        <div class="mt-8">
            @if($submission)
                @if($editMode)
                    <form wire:submit.prevent="updateSubmission">
                        <textarea wire:model="content" class="w-full p-2 border rounded" rows="5"
                            placeholder="Enter your submission here"></textarea>
                        <div class="mt-4">
                            <flux:button type="submit" variant="primary">Update Submission</flux:button>
                            <flux:button wire:click="cancelEdit">Cancel</flux:button>
                        </div>
                    </form>
                @else
                    <flux:callout variant="success" icon="check-circle" heading="You have already submitted this assignment.">
                        <x-slot name="actions">
                            <flux:button wire:click="editSubmission">Edit</flux:button>
                        </x-slot>
                    </flux:callout>
                @endif
            @elseif(now() > $classwork->due_date)
                <flux:callout variant="warning" icon="exclamation-circle"
                    heading="The due date for this assignment has passed." />
            @else
                <form wire:submit.prevent="submitAssignment">
                    <textarea wire:model="content" class="w-full p-2 border rounded" rows="5"
                        placeholder="Enter your submission here"></textarea>
                    <flux:button type="submit" variant="primary" class="mt-4">Submit Assignment</flux:button>
                </form>
            @endif
        </div>
    </div>
</div>
