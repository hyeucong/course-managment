<x-layouts.app title="Plan & Billing">
    <div class="relative w-full p-6">
        <div class="flex flex-wrap gap-4 justify-between">
            <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Plan & Billing</flux:heading>
        </div>

        <livewire:course.course-create />
    </div>
    <flux:separator variant="subtle" />

    <div class="relative w-full p-6">
        <div class="overflow-hidden rounded-xl border border-neutral-20
        flex flex-col justify-between p-5 h-fit gap-4" wire:navigate>
            <div class="flex flex-col gap-1">
                <h1 class="font-bold text-xl overflow-hidden whitespace-nowrap text-ellipsis">
                    Current Plan
                </h1>
                <p class="text-black">Manage and view your current plan</p>
            </div>

            <div class="flex flex-col gap-1">
                <h1 class="font-bold text-xl overflow-hidden whitespace-nowrap text-ellipsis">
                    Plan: Free
                </h1>
                <p class="text-black">No expiration.</p>
            </div>
        </div>
    </div>

</x-layouts.app>
