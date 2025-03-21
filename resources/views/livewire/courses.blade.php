<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    <div class="flex flex-wrap justify-between gap-4 items-center">
        <flux:dropdown>
            <flux:button icon-trailing="chevron-down">
                Sort: {{ ucfirst($sortField) }} {{ $sortDirection === 'asc' ? '↑' : '↓' }}
            </flux:button>

            <flux:menu>
                <flux:menu.item icon="pencil-square" kbd="⌘S" wire:click="sortBy('course_name')">Name</flux:menu.item>
                <flux:menu.item icon="document-duplicate" kbd="⌘D" wire:click="sortBy('date')">Date</flux:menu.item>
                <flux:menu.item icon="trash" variant="danger" kbd="⌘⌫" wire:click="clearSort">Clear</flux:menu.item>
            </flux:menu>
        </flux:dropdown>

        <div class="w-80">
            <flux:input icon="magnifying-glass" placeholder="Filter course name or code..." wire:model.live="search" />
        </div>

    </div>

    <div class="grid auto-rows-min gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($courses as $course)
            @if ($course->status !== 'archived')
                <div class="group relative overflow-hidden rounded-xl border border-zinc-200 shadow-sm flex flex-col justify-between p-6 h-[220px] cursor-pointer"
                    href="{{route('stream', $course)}}" wire:navigate>

                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-start">
                            <h1 class="font-bold text-xl overflow-hidden whitespace-nowrap text-ellipsis max-w-[80%]">
                                {{$course->course_name}}
                            </h1>
                            <flux:badge>{{Str::title($course->status)}}</flux:badge>
                        </div>

                        <div class="space-y-2.5 mt-1">
                            <div class="flex gap-2.5 items-center text-sm text-neutral-700">
                                <flux:icon.book-open class="h-4 w-4 text-neutral-500" />
                                <p class="overflow-hidden whitespace-nowrap text-ellipsis"> {{$course->course_code}}</p>
                            </div>
                            <div class="flex gap-2.5 items-center text-sm text-neutral-700">
                                <flux:icon.users class="h-4 w-4 text-neutral-500" />
                                <p class="overflow-hidden whitespace-nowrap text-ellipsis"> {{$course->lecturer}}</p>
                            </div>
                            <div class="flex gap-2.5 items-center text-sm text-neutral-700">
                                <flux:icon.calendar-days class="h-4 w-4 text-neutral-500" />
                                <p class="overflow-hidden whitespace-nowrap text-ellipsis">
                                    {{date('d M Y', strtotime($course->date_start))}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-3 border-t border-zinc-200 mt-2">
                        <div class="flex items-center gap-1.5">
                            <flux:badge class="flex items-center justify-center bg-stone-200 rounded-full h-6 w-6">
                                <flux:icon.academic-cap class="h-3.5 w-3.5 text-neutral-600" />
                            </flux:badge>
                            <span class="text-sm text-neutral-600">{{$course->student_count}}
                                students</span>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-span-full text-center text-neutral-500">
                <p>Create a course to get started</p>
            </div>
        @endforelse
    </div>
</div>
