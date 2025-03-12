<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <img src="https://pbs.twimg.com/media/GlcZba7bwAANcw8?format=jpg&name=4096x4096" alt="" style="height: 50dvh;"
            class="w-full object-cover rounded-xl mb-6">
        <div class="flex">
            <div class="mr-6 w-full pb-4 md:w-[220px]">
                <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                flex flex-col justify-between p-5">
                    <div class="flex flex-col gap-2 justify-between">
                        <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                            <flux:icon.clipboard-document-check />
                        </div>
                        <h1 class="font-bold text-2xl">Upcoming</h1>
                        <p>Attendance Rate</p>
                    </div>
                </div>
            </div>
            <div class="mr-10 pb-4 w-lg">
                <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl mb-6 flex flex-col gap-4">
                    <flux:textarea wire:model="description" placeholder="Announce something to your class" />
                    <div class="flex justify-between">
                        <div class="flex gap-4">
                            <flux:icon.arrow-up-on-square />
                            <flux:icon.link />
                        </div>
                        <flux:button wire:listen="course-edit" type="submit" variant="primary" wire:click="update"
                            class="cursor-pointer">Post
                        </flux:button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
