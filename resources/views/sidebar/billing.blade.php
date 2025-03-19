<x-layouts.app title="Plan & Billing">
    <div class="relative mb-6 w-full p-6">
        <div class="flex gap-4 justify-between mb-2">
            <flux:heading size="xl" level="1">Plan & Billing</flux:heading>
        </div>

        <flux:subheading size="lg" class="mb-6">Manage your subscription for this application.</flux:subheading>
        <flux:separator variant="subtle" />


        <div class="overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
            flex flex-col justify-between p-5 h-fit mt-6 gap-4" wire:navigate>
            <div class="flex flex-col gap-1">
                <h1 class="font-bold text-xl overflow-hidden whitespace-nowrap text-ellipsis">
                    Current Plan
                </h1>
                <p class="text-gray-300">Manage and view your current plan</p>
            </div>

            <div class="flex flex-col gap-1">
                <h1 class="font-bold text-xl overflow-hidden whitespace-nowrap text-ellipsis">
                    Plan: Free
                </h1>
                <p class="text-gray-300">No expiration.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
