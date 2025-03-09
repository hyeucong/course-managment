<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl mt-6">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        @foreach ($courses as $course)
            <a class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                                                                                                        flex flex-col justify-between p-5"
                href="{{route('course', $course)}}" wire:navigate>
                <div class="">
                    <h1 class="font-bold text-2xl mb-4">{{$course->course_name}}</h1>
                    <p>{{$course->course_code}}</p>
                    <p>{{$course->lecturer}}</p>
                    <p>{{$course->date_start}}</p>

                </div>
                <div class="flex justify-between">
                    <p class="text-gray-400">{{$total}}</p>
                    <flux:badge>{{Str::title($course->status)}}</flux:badge>
                </div>

            </a>
        @endforeach
    </div>
</div>
