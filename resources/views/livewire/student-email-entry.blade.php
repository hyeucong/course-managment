<div class="p-6 max-w-xl mx-auto mt-20">
    <div class="text-center mb-6">
        <flux:heading size="xl" level="1" class="mb-2">Student Email Entry</flux:heading>
        <flux:subheading size="lg" class="text-neutral-600">
            Enter your email to access the course.
        </flux:subheading>
    </div>

    <div class="bg-white rounded-xl border border-neutral-200 shadow-sm p-6">
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <flux:input type="email" wire:model="email" placeholder="Enter your email" class="w-full" />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <flux:input type="text" wire:model="courseId" placeholder="Enter course ID" class="w-full" />
                @error('courseId') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <flux:button type="submit" variant="primary" class="w-full">
                <span wire:loading.remove>Submit</span>
                <span wire:loading>Submitting...</span>
            </flux:button>
        </form>
    </div>
</div>
