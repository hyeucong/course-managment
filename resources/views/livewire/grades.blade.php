<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <flux:heading size="xl" level="1" class="mb-2">Grades</flux:heading>
                <flux:subheading size="lg" class="text-neutral-600 dark:text-neutral-400">
                    Track and manage student grades for this course.
                </flux:subheading>
            </div>
        </div>

        <div
            class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-zinc-50 dark:bg-zinc-900">
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Student Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Student ID</th>
                            @foreach($classworks as $classwork)
                                <th
                                    class="px-6 py-4 text-center text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                    {{ $classwork->title }}
                                </th>
                            @endforeach
                            <th
                                class="px-6 py-4 text-center text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                Total Grade</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                        @forelse($students as $student)
                                                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/70 transition-colors">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center gap-3">
                                                            <div class="flex-shrink-0 bg-neutral-100 dark:bg-neutral-700 rounded-full p-2">
                                                                <flux:icon.user variant="mini"
                                                                    class="size-5 text-neutral-500 dark:text-neutral-400" />
                                                            </div>
                                                            <div class="font-medium text-neutral-900 dark:text-neutral-100">
                                                                {{ $student->first_name }} {{ $student->last_name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-600 dark:text-neutral-400">
                                                        {{ $student->id }}
                                                    </td>
                                                    @foreach($classworks as $classwork)
                                                                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                                                                @php
                                                                                    $grade = $grades[$student->id][$classwork->id] ?? null;
                                                                                    $color = $grade >= 80 ? 'success' : ($grade >= 60 ? 'warning' : 'danger');
                                                                                @endphp
                                                                                @if($grade !== null)
                                                                                    <flux:badge color="{{ $color }}" variant="pill">{{ $grade }}</flux:badge>
                                                                                @else
                                                                                    <span class="text-neutral-400 dark:text-neutral-500">-</span>
                                                                                @endif
                                                                            </td>
                                                    @endforeach
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                                        @php
                                                            $totalGrade = $totalGrades[$student->id] ?? null;
                                                            $color = $totalGrade >= 80 ? 'success' : ($totalGrade >= 60 ? 'warning' : 'danger');
                                                        @endphp
                                                        @if($totalGrade !== null)
                                                            <flux:badge color="{{ $color }}" variant="pill">{{ $totalGrade }}</flux:badge>
                                                        @else
                                                            <span class="text-neutral-400 dark:text-neutral-500">-</span>
                                                        @endif
                                                    </td>
                                                </tr>
                        @empty
                            <tr>
                                <td colspan="{{ 3 + count($classworks) }}" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div class="p-4 rounded-full bg-neutral-100 dark:bg-neutral-800">
                                            <flux:icon.user variant="outline"
                                                class="size-8 text-neutral-400 dark:text-neutral-500" />
                                        </div>
                                        <div class="text-lg font-medium text-neutral-900 dark:text-neutral-100">
                                            No students found
                                        </div>
                                        <div class="text-sm text-neutral-500 dark:text-neutral-400">
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
