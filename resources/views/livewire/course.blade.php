<div class="relative mb-6 w-full">
    <flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar scrollable>
            <flux:navbar.item href="#" current>Overview</flux:navbar.item>
            <flux:navbar.item href="#">Stream</flux:navbar.item>
            <flux:navbar.item href="#">Attendance</flux:navbar.item>
            <flux:navbar.item badge="32" href="#">People</flux:navbar.item>
            <flux:navbar.item href="#">Grades</flux:navbar.item>
            <flux:navbar.item href="#">Details</flux:navbar.item>
            <flux:navbar.item href="#">Settings</flux:navbar.item>
        </flux:navbar>
    </flux:header>

    <div class="p-6">
        <div class="flex gap-4 justify-between">
            <flux:heading size="xl" level="1">{{$this->course->course_name}}</flux:heading>
            <div class="flex justify-end gap-4">
                <flux:button wire:click="delete({{$this->course->id}})">Delete</flux:button>
                <flux:button wire:click="edit({{$this->course->id}})" variant="primary">Edit</flux:button>
            </div>
        </div>

        <flux:subheading size="lg" class="mb-6">{{$this->course->course_code}}</flux:subheading>
        <flux:separator class="mb-6" variant="subtle" />

        <flux:subheading size="xl" class="mb-6">🎉 Congratulations, you've got a place to store files!</flux:subheading>

        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            @for ($i = 0; $i < 4; $i++)
                <a class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                    flex flex-col justify-between p-5">
                    <div class="">
                        <h1 class="font-bold text-2xl mb-4">Course Progress</h1>
                        <p>45%</p>

                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-400">150 students</p>
                    </div>
                </a>
            @endfor
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-2 mt-6">
            <a class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                flex flex-col justify-between p-5">
                <div class="">
                    <h1 class="font-bold text-2xl mb-4">Top graded</h1>
                    <p>45%</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-400">150 students</p>
                </div>
            </a>
        </div>

        <livewire:course-edit />

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
