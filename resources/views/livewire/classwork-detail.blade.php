<div class="relative w-full">
    <x-course-header :course="$course" :activeTab="'classwork'" />

    <div class="p-6 max-w-7xl mx-auto">

        <div class="mt-8">
            <flux:heading size="xl">{{ $classwork->title }}</flux:heading>
            <p class="mt-2 text-neutral-600 dark:text-neutral-400">{{ $classwork->description }}</p>
            <div class="mt-4">
                <flux:badge color="primary">{{ $classwork->points }} points</flux:badge>
                <flux:badge color="secondary">Due {{ $classwork->due_date->format('M d, Y H:i A') }}</flux:badge>
            </div>
        </div>

        <div class="mt-12">
            <flux:heading size="lg">Submissions</flux:heading>
            @if($submissions->count() > 0)
                <div
                    class="mt-4 bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-zinc-50 dark:bg-zinc-900">
                                    <th
                                        class="px-6 py-4 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                        Student Name</th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                        Submitted At</th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-medium text-neutral-700 dark:text-neutral-300">
                                        Content</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                                @foreach($submissions as $submission)
                                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/70 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="flex-shrink-0 bg-neutral-100 dark:bg-neutral-700 rounded-full p-2">
                                                    <flux:icon.user variant="mini"
                                                        class="size-5 text-neutral-500 dark:text-neutral-400" />
                                                </div>
                                                <div class="font-medium text-neutral-900 dark:text-neutral-100">
                                                    {{ $submission->student->first_name }} {{ $submission->student->last_name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-600 dark:text-neutral-400">
                                            {{ $submission->created_at->format('M d, Y H:i A') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-neutral-600 dark:text-neutral-400">
                                            @if($submission->content)
                                                {{ Str::limit($submission->content, 100) }}
                                            @else
                                                <span class="text-neutral-400 dark:text-neutral-500">No content</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div
                    class="mt-4 bg-white dark:bg-zinc-800 rounded-xl border border-neutral-200 dark:border-neutral-700 shadow-sm p-6 text-center">
                    <div class="flex flex-col items-center justify-center gap-3">
                        <div class="p-4 rounded-full bg-neutral-100 dark:bg-neutral-800">
                            <flux:icon.document-text variant="outline"
                                class="size-8 text-neutral-400 dark:text-neutral-500" />
                        </div>
                        <div class="text-lg font-medium text-neutral-900 dark:text-neutral-100">
                            No submissions yet
                        </div>
                        <div class="text-sm text-neutral-500 dark:text-neutral-400">
                            Students haven't submitted any work for this assignment
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
