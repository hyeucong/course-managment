<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex justify-between mb-6">
            <flux:heading size="xl" level="1">Classwork</flux:heading>
            <flux:modal.trigger name="create-assignment">
                <flux:button variant="primary">
                    <div class="flex items-center gap-2">
                        <flux:icon.plus-circle />
                        Create
                    </div>
                </flux:button>
            </flux:modal.trigger>
        </div>

        <div class="space-y-4">
            <div
                class="p-4 border border-neutral-200 dark:border-neutral-700 rounded-xl hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                <div class="flex items-start gap-4">
                    <div class="p-2 border border-neutral-200 dark:border-neutral-700 rounded-xl">
                        <flux:icon.document-text />
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="font-semibold">Final Project Submission</h3>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">Due Dec 15</p>
                        </div>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Submit your final project with
                            documentation</p>
                        <div class="flex gap-2 mt-3">
                            <flux:badge>100 points</flux:badge>
                            <flux:badge>Assignment</flux:badge>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quiz Item -->
            <div
                class="p-4 border border-neutral-200 dark:border-neutral-700 rounded-xl hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                <div class="flex items-start gap-4">
                    <div class="p-2 border border-neutral-200 dark:border-neutral-700 rounded-xl">
                        <flux:icon.academic-cap />
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="font-semibold">Midterm Exam</h3>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">Dec 10, 10:00 AM</p>
                        </div>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Online exam covering all material
                            from weeks 1-6</p>
                        <div class="flex gap-2 mt-3">
                            <flux:badge>50 points</flux:badge>
                            <flux:badge>Quiz</flux:badge>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Material Item -->
            <div
                class="p-4 border border-neutral-200 dark:border-neutral-700 rounded-xl hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                <div class="flex items-start gap-4">
                    <div class="p-2 border border-neutral-200 dark:border-neutral-700 rounded-xl">
                        <flux:icon.clipboard-document-check />
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="font-semibold">Week 7 Lecture Notes</h3>
                            <p class="text-sm text-neutral-600 dark:text-neutral-400">Posted Nov 28</p>
                        </div>
                        <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Lecture slides and supplementary
                            reading materials</p>
                        <div class="flex gap-2 mt-3">
                            <flux:badge>Material</flux:badge>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Assignment Modal -->
    <flux:modal name="create-assignment" class="md:w-[500px]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Assignment</flux:heading>
            </div>

            <div class="space-y-4">
                <flux:select label="Type">
                    <option value="assignment">Assignment</option>
                    <option value="quiz">Quiz</option>
                    <option value="material">Material</option>
                </flux:select>

                <flux:input type="text" label="Title" placeholder="Enter assignment title" />

                <flux:textarea label="Instructions" placeholder="Provide detailed instructions" rows="4" />

                <div class="grid grid-cols-2 gap-4">
                    <flux:input type="number" label="Points" placeholder="100" />
                    <flux:input type="date" label="Due Date" />
                </div>

                <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-xl">
                    <div class="flex items-center gap-2">
                        <flux:icon.arrow-up-on-square />
                        <span>Add attachments</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <flux:button type="submit" variant="primary">Create</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
