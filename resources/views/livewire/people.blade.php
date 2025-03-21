<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6 max-w-7xl mx-auto space-y-8">
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Teachers</h2>
                <flux:modal.trigger name="add-teacher">
                    <flux:button>Add Teacher</flux:button>
                </flux:modal.trigger>
            </div>

            <div class="space-y-2">
                @foreach($teachers as $teacher)
                    <x-lists.teacher-list :teacher="$teacher" />
                @endforeach
            </div>
        </div>

        <livewire:people.add-teacher :courseId="$courseId" />

        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Students</h2>
                <flux:modal.trigger name="student-create">
                    <flux:button>Add Student</flux:button>
                </flux:modal.trigger>
            </div>

            <livewire:people.student-create />
            <div class="space-y-2">
                @forelse($students as $student)
                    <x-lists.student-list :student="$student" />
                @empty
                    <div class="bg-white rounded-xl border border-neutral-200 shadow-sm overflow-hidden">
                        <div class="p-6 text-center">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="p-4 rounded-full bg-neutral-100 ">
                                    <flux:icon.users class="size-8 text-neutral-400 " />
                                </div>
                                <div class="text-lg font-medium text-neutral-900 ">
                                    No students found
                                </div>
                                <div class="text-sm text-neutral-500 ">
                                    Add a student to get started
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <x-modal.edit-student />
        </div>
    </div>
</div>
