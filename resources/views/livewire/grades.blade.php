<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="mb-6">
            <flux:heading size="xl" level="1">Grades</flux:heading>
            <flux:subheading size="lg">Track and manage student grades for this course.</flux:subheading>
        </div>

        <div class="bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="overflow-x-auto" style="min-width: 100%;">
                <table class="w-full" style="min-width: 768px;">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Student Name</th>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Student ID</th>
                            @foreach($classworks as $classwork)
                                <th class="px-4 py-3 text-center whitespace-nowrap">{{ $classwork->title }}</th>
                            @endforeach
                            <th class="px-4 py-3 text-center whitespace-nowrap">Total Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap">{{ $student->first_name }} {{ $student->last_name }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ $student->id }}</td>
                                @foreach($classworks as $classwork)
                                    <td class="px-4 py-3 text-center whitespace-nowrap">
                                        {{ $grades[$student->id][$classwork->id] ?? '-' }}
                                    </td>
                                @endforeach
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    {{ $totalGrades[$student->id] ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td colspan="{{ 3 + count($classworks) }}" class="px-4 py-12 text-center">
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
