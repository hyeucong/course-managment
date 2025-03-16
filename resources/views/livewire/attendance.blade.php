<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex justify-between">
            <div>
                <flux:heading size="xl" level="1">Attendance</flux:heading>

                <flux:subheading size="lg" class="mb-6">Track and manage student attendance for this course.
                </flux:subheading>
            </div>
            <div class="flex gap-4">
                <flux:select wire:model.live="selectedDate">
                    <flux:select.option value="">Select a date</flux:select.option>
                    @foreach($availableDates as $dateValue => $dateLabel)
                        <flux:select.option value="{{ $dateValue }}">{{ $dateLabel }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:button variant="primary" class="cursor-pointer" wire:click="saveAttendance">
                    Save
                </flux:button>
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="overflow-x-auto" style="min-width: 100%;">
                <table class="w-full" style="min-width: 768px;">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Student ID</th>
                            <th class="px-4 py-3 text-center whitespace-nowrap">Status</th>
                            <th class="px-4 py-3 text-center whitespace-nowrap">Individual A.R (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                                                <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                                    <td class="px-4 py-3 whitespace-nowrap">{{ $student->first_name }} {{$student->last_name}}
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap">{{ $student->id}}</td>
                                                    <td class="px-4 py-3 text-center w-34 whitespace-nowrap">
                                                        <flux:select wire:model="attendanceStatus.{{ $student->id }}">
                                                            <flux:select.option value="P">Present</flux:select.option>
                                                            <flux:select.option value="A">Absent</flux:select.option>
                                                            <flux:select.option value="L">Late</flux:select.option>
                                                        </flux:select>
                                                    </td>
                                                    <td class="px-4 py-3 text-center whitespace-nowrap">
                                                        @php
                                                            $rate = $attendanceRates[$student->id];
                                                            $color = $rate >= 80 ? 'success' : ($rate >= 60 ? 'warning' : 'danger');
                                                        @endphp
                                                        <flux:badge color="{{ $color }}">{{ $rate }}%</flux:badge>
                                                    </td>
                                                </tr>
                        @empty
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td colspan="4" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-1">
                                        <div class="text-lg font-medium text-gray-900 dark:text-gray-100">No students found
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Add some students to get
                                            started</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
