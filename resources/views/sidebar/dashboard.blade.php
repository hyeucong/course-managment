<x-layouts.app title="Dashboard">
    <div class="relative mb-6 w-full p-6">
        <div class="flex gap-4 justify-between items-center">
            <div class="flex flex-col">
                <flux:heading size="xl" level="1">Dashboard</flux:heading>
                <flux:subheading size="lg" class="mb-6">Manage your courses and class settings</flux:subheading>
            </div>
            <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                <flux:icon.bell />
            </div>
        </div>

        <flux:separator variant="subtle" />

        <div class="grid auto-rows-min gap-4 md:grid-cols-4 mt-6">
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
            flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.presentation-chart-line />
                    </div>
                    <h1 class="font-bold text-2xl">100</h1>
                    <p>Average Result</p>
                </div>
            </div>
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
            flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.presentation-chart-line />
                    </div>
                    <h1 class="font-bold text-2xl">100</h1>
                    <p>Average Result</p>
                </div>
            </div>
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
            flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.presentation-chart-line />
                    </div>
                    <h1 class="font-bold text-2xl">100</h1>
                    <p>Average Result</p>
                </div>
            </div>
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
            flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.presentation-chart-line />
                    </div>
                    <h1 class="font-bold text-2xl">100</h1>
                    <p>Average Result</p>
                </div>
            </div>
        </div>



    </div>
</x-layouts.app>
