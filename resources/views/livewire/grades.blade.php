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
                            <th class="px-4 py-3 text-left whitespace-nowrap">Assignment</th>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Midterm</th>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Project</th>
                            <th class="px-4 py-3 text-left whitespace-nowrap">Final</th>
                            <th class="px-4 py-3 text-center whitespace-nowrap">Total Grade</th>
                            <th class="px-4 py-3 text-center whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($course->students as $student)
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td class="px-4 py-3 whitespace-nowrap">{{ $student->first_name }} {{ $student->last_name }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ rand(70, 100) }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ rand(70, 100) }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ rand(70, 100) }}</td>
                                <td class="px-4 py-3 whitespace-nowrap">{{ rand(70, 100) }}</td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    <flux:badge color="success">{{ rand(70, 100) }}%</flux:badge>
                                </td>
                                <td class="px-4 py-3 text-center whitespace-nowrap">
                                    <div class="flex justify-center gap-2">
                                        <flux:button size="sm">Edit</flux:button>
                                        <flux:button size="sm">
                                            <flux:icon.ellipsis-vertical />
                                        </flux:button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td colspan="7" class="px-4 py-3 text-center">No students enrolled in this course.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
