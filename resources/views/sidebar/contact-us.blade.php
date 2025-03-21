<x-layouts.app title="Support & Help">
    <div class="relative w-full p-6">
        <div class="flex flex-wrap gap-4 justify-between">
            <flux:heading size="xl" class="text-2xl md:text-3xl lg:text-4xl font-bold">Need assistance? We're ready
                help!
            </flux:heading>
        </div>
    </div>

    <flux:separator variant="primary" />

    <div class="relative w-full p-6">
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-6 max-w-3xl min-w-[400px]">
            <div class="flex-1 space-y-6 max-w-xl">
                <flux:callout icon="sparkles" color="emerald" class="cursor-pointer">
                    <flux:callout.heading>Got an innovative feature suggestion?</flux:callout.heading>

                    <flux:callout.text>
                        Share your ideas or vote on upcoming enhancements
                    </flux:callout.text>
                </flux:callout>

                <flux:callout variant="warning" icon="exclamation-circle" class="cursor-pointer">
                    <flux:callout.heading>Encountered a technical issue?</flux:callout.heading>

                    <flux:callout.text>
                        Interface problems or system errors? Let us know here
                    </flux:callout.text>
                </flux:callout>

                <flux:callout icon="information-circle" color="purple" class="cursor-pointer">
                    <flux:callout.heading>Questions about your account or subscription?</flux:callout.heading>

                    <flux:callout.text>
                        Contact our dedicated team at support@lecturespace.com
                    </flux:callout.text>
                </flux:callout>
            </div>
        </div>
    </div>

</x-layouts.app>
