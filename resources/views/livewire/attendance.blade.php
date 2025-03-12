<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <!-- Attendance Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                <div class="flex flex-col gap-2">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.users />
                    </div>
                    <h1 class="font-bold text-2xl">{{ $totalStudents ?? 0 }}</h1>
                    <p>Total Students</p>
                </div>
            </div>

            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                <div class="flex flex-col gap-2">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.clipboard-document-check />
                    </div>
                    <h1 class="font-bold text-2xl">{{ $attendanceRate ?? '0%' }}</h1>
                    <p>Average Attendance Rate</p>
                </div>
            </div>

            <div class="aspect-auto overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                <div class="flex flex-col gap-2">
                    <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-2xl w-fit mb-6">
                        <flux:icon.calendar-days />
                    </div>
                    <h1 class="font-bold text-2xl">{{ $totalSessions ?? 0 }}</h1>
                    <p>Total Sessions</p>
                </div>
            </div>
        </div>

        <!-- Attendance Management Section -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Attendance Record</h2>
                <div class="flex gap-4">
                    <input type="date" wire:model="selectedDate"
                        class="rounded-lg border-neutral-200 dark:border-neutral-700">
                    <button class="px-4 py-2 bg-zinc-800 dark:bg-zinc-700 text-white rounded-lg">Take
                        Attendance</button>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-zinc-50 dark:bg-zinc-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Student Name</th>
                            <th class="px-4 py-3 text-left">Student ID</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students ?? [] as $student)
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td class="px-4 py-3">{{ $student->name ?? '' }}</td>
                                <td class="px-4 py-3">{{ $student->student_id ?? '' }}</td>
                                <td class="px-4 py-3 text-center">
                                    <select wire:model="attendance.{{ $student->id }}"
                                        class="rounded-lg border-neutral-200 dark:border-neutral-700">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                        <option value="late">Late</option>
                                        <option value="excused">Excused</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <button class="text-blue-600 hover:text-blue-800 dark:text-blue-400">View
                                        History</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-center">No students found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
