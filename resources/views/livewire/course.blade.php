<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex justify-between">
            <div>
                <flux:heading size="xl" level="1">{{$course->course_name}}</flux:heading>
                <flux:subheading size="lg" class="mb-6">{{$course->course_code}}</flux:subheading>
            </div>
            <div
                class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6 flex items-center gap-2 px-6">
                <h1>Class Code:</h1>
                <p>jskdaosdk</p>
                <flux:icon.document-duplicate />
            </div>
        </div>

        <flux:separator class="mb-6" variant="subtle" />

        <flux:subheading size="xl" class="mb-6">🎉 Congratulations, you've got a place to store files!</flux:subheading>


        {{-- Overview Card --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            {{-- Student Enrolled Card --}}
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                        flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.user-group />
                    </div>
                    <h1 class="font-bold text-2xl">{{$total}}</h1>
                    <p>Student Enrolled</p>
                </div>
            </div>

            {{-- Average Result Card --}}
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                        flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.presentation-chart-line />
                    </div>
                    <h1 class="font-bold text-2xl">{{$total}}/100</h1>
                    <p>Average Result</p>
                </div>
            </div>

            {{-- Course Progress Card --}}
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                        flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.calendar-days />
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2 mt-2 dark:bg-gray-700">
                        <div class="bg-gray-600 h-2.5 rounded-full dark:bg-gray-300" style="width: 45%"></div>
                    </div>
                    <p>Course Progress</p>
                </div>
            </div>

            {{-- Attendance Rate Card --}}
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 
                        flex flex-col justify-between p-5">
                <div class="flex flex-col gap-2 justify-between">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.clipboard-document-check />
                    </div>
                    <h1 class="font-bold text-2xl">92 %</h1>
                    <p>Attendance Rate</p>
                </div>
            </div>
        </div>
    </div>
</div>
