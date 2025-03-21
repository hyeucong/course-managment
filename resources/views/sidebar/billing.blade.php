<x-layouts.app title="Plan & Billing">
    <div class="relative w-full p-6">
        <div class="flex flex-wrap gap-4 justify-between">
            <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Plan & Billing</flux:heading>
        </div>
    </div>

    <flux:separator variant="subtle" />

    <div class="relative w-full p-6">
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-6 max-w-3xl min-w-[400px]">
            <div class="flex-1 space-y-6 max-w-xl">
                <div>
                    <flux:heading size="lg" level="3">Current Plan</flux:heading>
                    <flux:subheading size="base" class="mb-6">Manage and view your current plan</flux:subheading>
                    <flux:heading size="lg" level="3">Plan
                        <flux:badge color="lime">Free</flux:badge>
                    </flux:heading>
                </div>
                <flux:separator variant="subtle" class="my-8" />

                <flux:heading size="lg" level="3">Available Plans</flux:heading>
                <flux:subheading size="base" class="mb-6">View available plans and change subscription
                </flux:subheading>
                <div class="rounded-xl border border-zinc-200 flex flex-col justify-between p-6">
                    <div class="flex flex-col">
                        <div class="flex justify-between items-start">
                            <h1 class="font-bold text-xl overflow-hidden max-w-[80%]">
                                Free
                            </h1>
                            <flux:button variant="filled">Current plan</flux:button>
                        </div>
                        <ul class="flex flex-col gap-2 text-sm text-neutral-700">
                            <li>- Create up to 5 courses</li>
                            <li>- Enroll up to 10 students per course</li>
                            <li>- Priority support</li>
                        </ul>
                    </div>
                </div>

                <div class="rounded-xl border border-zinc-200 flex flex-col justify-between p-6">
                    <div class="flex flex-col">
                        <div class="flex justify-between items-start">
                            <h1 class="font-bold text-xl overflow-hidden max-w-[80%]">
                                5$<span class="text-sm font-light">/Month</span>
                            </h1>
                            <flux:button>Switch to Personal</flux:button>
                        </div>
                        <ul class="flex flex-col gap-2 text-sm text-neutral-700">
                            <li>- Create unlimited courses</li>
                            <li>- Enroll unlimited students</li>
                            <li>- Dedicated Support</li>
                        </ul>
                    </div>
                </div>

                <div class="rounded-xl border border-zinc-200 flex flex-col justify-between p-6">
                    <div class="flex flex-col">
                        <div class="flex justify-between items-start">
                            <h1 class="font-bold text-xl overflow-hidden max-w-[80%]">
                                For Business
                            </h1>
                            <flux:button>Schedule a call</flux:button>
                        </div>
                        <ul class="flex flex-col gap-2 text-sm text-neutral-700">
                            <li>- Everything in Personal</li>
                            <li>- Custom features</li>
                            <li>- Access to newest features </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
