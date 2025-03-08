<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl mt-6">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        @foreach ($courses as $course)
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 flex flex-col justify-between p-5">
                <div class="">
                    <h1 class="font-bold text-2xl mb-4">{{$course->title}}</h1>
                    <p>{{$course->description}}</p>
                </div>
                <div class="flex justify-end gap-4">
                    <flux:button wire:click="delete({{$course->id}})">Delete</flux:button>

                    <flux:button wire:click="edit({{$course->id}})" variant="primary">Edit</flux:button>
                </div>
            </div>
        @endforeach
        <flux:modal name="delete-course" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete Course?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this Course.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="destroy()">Delete Course</flux:button>
                </div>
            </div>
        </flux:modal>
    </div>
</div>
