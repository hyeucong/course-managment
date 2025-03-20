<div class="relative w-full">
    <x-student-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="mt-8">
            <flux:heading size="xl">{{ $classwork->title }}</flux:heading>
            <p class="mt-2 text-neutral-600 dark:text-neutral-400">{{ $classwork->description }}</p>
            <div class="mt-4">
                <flux:badge color="primary">{{ $classwork->points }} points</flux:badge>
                <flux:badge color="secondary">Due {{ $classwork->due_date->format('M d, Y H:i A') }}</flux:badge>
            </div>
        </div>

        <div class="mt-8">
            @if($submission)
                <p class="text-green-600 dark:text-green-400">You have already submitted this assignment.</p>
            @else
                <form wire:submit.prevent="submitAssignment">
                    <flux:textarea wire:model="content" label="Your submission" rows="5"></flux:textarea>
                    <div class="mt-4">
                        <flux:button type="submit" variant="primary">Submit Assignment</flux:button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
