<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <flux:heading size="xl" level="1" class="mb-2">Grades</flux:heading>
                <flux:subheading size="lg" class="text-neutral-600">
                    Track and manage student grades for this course.
                </flux:subheading>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-zinc-50">
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700">
                                Student Name</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-neutral-700">
                                Student Email</th>
                            @foreach($classworks as $classwork)
                                <th class="px-6 py-4 text-center text-sm font-medium text-neutral-700">
                                    {{ $classwork->title }}
                                </th>
                            @endforeach
                            <th class="px-6 py-4 text-center text-sm font-medium text-neutral-700">
                                Total Grade</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        @forelse($students as $student)
                            <x-lists.grade-table :students="$students" :classworks="$classworks" :grades="$grades"
                                :totalGrades="$totalGrades" :student="$student" />
                        @empty
                            <tr>
                                <td colspan="{{ 3 + count($classworks) }}" class="px-6 py-12 text-center">
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
