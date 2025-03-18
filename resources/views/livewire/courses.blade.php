<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl mt-6">
    <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
        @foreach ($courses as $course)
            <a class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                                                        flex flex-col justify-between p-5 h-fit"
                href="{{route('stream', $course)}}" wire:navigate>
                <div class="flex flex-col gap-2">
                    <h1 class="font-bold text-2xl overflow-hidden whitespace-nowrap text-ellipsis">
                        {{$course->course_name}}
                    </h1>
                    <div class="flex gap-2 items-center">
                        <flux:icon.book-open />
                        <p class="overflow-hidden whitespace-nowrap text-ellipsis"> {{$course->course_code}}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <flux:icon.users />
                        <p class="overflow-hidden whitespace-nowrap text-ellipsis"> {{$course->lecturer}}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <flux:icon.calendar-days />
                        <p class="overflow-hidden whitespace-nowrap text-ellipsis">
                            {{date('d-m-Y', strtotime($course->date_start))}}
                        </p>
                    </div>

                </div>
                <div class="flex justify-between">
                    <p class="text-gray-400">{{$course->student_count}} students</p>
                    <flux:badge>{{Str::title($course->status)}}</flux:badge>
                </div>

            </a>
        @endforeach
    </div>
</div>
