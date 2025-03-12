<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex gap-4 justify-between mb-6">
            <flux:heading size="xl" level="1">Grade Book</flux:heading>

            <div class="flex gap-4">
                <div class="w-80">
                    <flux:input icon="magnifying-glass" placeholder="Search students..." />
                </div>
                <flux:button variant="primary" class="cursor-pointer">
                    Export Grades
                </flux:button>
                <flux:button variant="primary" class="cursor-pointer">
                    Add Assignment
                </flux:button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">
            <table class="w-full border-collapse ">
                <thead>
                    <tr class="border-b border-neutral-200 dark:border-neutral-700">
                        <th class="p-4 text-left">Student Name</th>
                        <th class="p-4 text-left">Assignment</th>
                        <th class="p-4 text-left">Midterm</th>
                        <th class="p-4 text-left">Project</th>
                        <th class="p-4 text-left">Final</th>
                        <th class="p-4 text-left">Total Grade</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(['John Doe', 'Jane Smith', 'Bob Johnson', 'Alice Williams', 'Charlie Brown'] as $student)
                        <tr class="border-b border-neutral-200 dark:border-neutral-700">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <flux:icon.user class="w-8 h-8" />
                                    {{ $student }}
                                </div>
                            </td>
                            <td class="p-4">{{ rand(70, 100) }}</td>
                            <td class="p-4">{{ rand(70, 100) }}</td>
                            <td class="p-4">{{ rand(70, 100) }}</td>
                            <td class="p-4">{{ rand(70, 100) }}</td>
                            <td class="p-4">
                                <flux:badge color="success">{{ rand(70, 100) }}%</flux:badge>
                            </td>
                            <td class="p-4">
                                <div class="flex gap-2">
                                    <flux:button size="sm">Edit</flux:button>
                                    <flux:button size="sm">
                                        <flux:icon.ellipsis-vertical />
                                    </flux:button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
