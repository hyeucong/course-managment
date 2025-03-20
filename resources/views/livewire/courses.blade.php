<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl mt-6">
    <div class="grid auto-rows-min gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($courses as $course)
            <a class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between p-6 h-[220px]"
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

                <div class="flex justify-between items-center pt-3 border-t border-neutral-100 mt-2">
                    <div class="flex items-center gap-1.5">
                        <span class="flex items-center justify-center bg-neutral-100 rounded-full h-6 w-6">
                            <flux:icon.academic-cap class="h-3.5 w-3.5 text-neutral-600" />
                        </span>
                        <span class="text-sm text-neutral-600">{{$course->student_count}}
                            students</span>
                    </div>
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                        <flux:icon.arrow-right class="h-4 w-4 text-neutral-500" />
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center text-neutral-500">
                <p>Create a course to get started</p>
            </div>
        @endforelse
    </div>
</div>
