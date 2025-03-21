<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <flux:heading size="xl" level="1" class="mb-2">Attendance</flux:heading>
                <flux:subheading size="lg" class="text-neutral-600">
                    Track and manage student attendance for this course.
                </flux:subheading>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <flux:select wire:model.live="selectedDate" class="min-w-[200px]" wire:loading.attr="disabled">
                    @foreach($this->availableDatesWithAttendance as $dateValue => $dateInfo)
                        <flux:select.option value="{{ $dateValue }}"
                            class="{{ $dateInfo['hasAttendance'] ? 'bg-green-100' : '' }}">
                            {{ $dateInfo['display'] }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:button variant="primary" class="cursor-pointer" wire:click="saveAttendance">
                    Save
                </flux:button>
            </div>

        </div>

        <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden relative">
            <div wire:loading.delay class="absolute inset-0 bg-white/50 z-10 flex items-center justify-center pt-6">
                <div class="text-center">
                    <flux:icon.loading variant="outline" class="size-8 animate-spin mx-auto text-primary-500" />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-zinc-50">
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700">
                                Student Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700">
                                Student Email</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-neutral-700">
                                Status</th>
                            <th class="px-6 py-4 text-center text-sm font-medium text-neutral-700">
                                Attendance Rate</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        @forelse($students as $student)
                            <x-lists.student-attendance :student="$student"
                                :attendanceStatus="$attendanceStatus[$student->id] ?? ''"
                                :attendanceRate="$attendanceRates[$student->id] ?? 0" />
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div class="p-4 rounded-full bg-neutral-100">
                                            <flux:icon.user variant="outline" class="size-8 text-neutral-400" />
                                        </div>
                                        <div class="text-lg font-medium text-neutral-900">
                                            No students found
                                        </div>
                                        <div class="text-sm text-neutral-500">
                                            Add some students to get started
                                        </div>
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
