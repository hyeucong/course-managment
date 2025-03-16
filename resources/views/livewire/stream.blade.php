<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="relative group">
            <img src="https://images.unsplash.com/photo-1740166260052-b41e5381bcbb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="" style="height: 50dvh;" class="w-full object-cover rounded-xl mb-6">
            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                <flux:modal.trigger name="edit-background">
                    <flux:button>Edit</flux:button>
                </flux:modal.trigger>
            </div>
        </div>
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
                    <flux:textarea placeholder="Announce something to your class" />
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

    <flux:modal name="edit-background" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Background</flux:heading>
            </div>
            <flux:input type=url label="Image Url" placeholder="Paste an image url" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
