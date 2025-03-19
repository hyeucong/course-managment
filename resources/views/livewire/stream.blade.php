<div class="relative w-full">
    @if($isStudent)
        <x-student-header :course="$course" :activeTab="$activeTab" />
    @else
        <x-course-header :course="$course" :activeTab="$activeTab" />
    @endif

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Hero Section with Course Banner -->
        <div class="relative group mb-8">
            <img src="https://images.unsplash.com/photo-1740166260052-b41e5381bcbb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Course Banner" class="w-full h-[300px] object-cover rounded-xl">
            <div class="absolute bottom-4 left-4 bg-white/80 dark:bg-neutral-800/80 p-4 rounded-lg backdrop-blur-sm">
                <h1 class="text-3xl font-bold">{{ $course->course_name ?? 'Course Stream' }}</h1>
                <p class="text-lg text-neutral-600 dark:text-neutral-300">
                    {{ $course->course_code ?? 'Course updates and announcements' }}
                </p>
            </div>
            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                <flux:modal.trigger name="edit-background">
                    <flux:button variant="filled">
                        <flux:icon.pencil class="mr-1" />
                        Edit Banner
                    </flux:button>
                </flux:modal.trigger>
            </div>
        </div>

        @if(!$isStudent)
            <!-- Main Content Area -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Main Content - Post Stream -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Create Post Card -->
                    <div
                        class="p-5 border border-neutral-200 dark:border-neutral-700 rounded-xl bg-white dark:bg-neutral-800/50">
                        <h2 class="font-semibold text-xl mb-4">Create Announcement</h2>
                        <form wire:submit.prevent="createPost">
                            <flux:textarea wire:model="postContent" placeholder="Share an announcement with your class..."
                                class="mb-4" />
                            <div class="flex justify-between items-center">
                                <div class="flex gap-3">
                                    <flux:button variant="ghost" type="button" title="Upload file"
                                        class="border border-neutral-200 dark:border-neutral-700 rounded-lg">
                                        <flux:icon.arrow-up-on-square />
                                    </flux:button>
                                    <flux:button variant="ghost" type="button" title="Add link"
                                        class="border border-neutral-200 dark:border-neutral-700 rounded-lg">
                                        <flux:icon.link />
                                    </flux:button>
                                </div>
                                <flux:button type="submit" variant="primary">Post</flux:button>
                            </div>
                        </form>
                    </div>

                    <!-- Posts Feed -->
                    <div class="space-y-4">
                        <h2 class="font-semibold text-xl px-1">Recent Announcements</h2>

                        @forelse($posts as $post)
                            <div
                                class="p-5 border border-neutral-200 dark:border-neutral-700 rounded-xl bg-white dark:bg-neutral-800/50">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center">
                                        <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}"
                                            class="w-10 h-10 rounded-full mr-3 border border-neutral-200 dark:border-neutral-700">
                                        <div>
                                            <div class="font-semibold">{{ $post->user->name }}</div>
                                            <div class="text-sm text-neutral-500 dark:text-neutral-400">
                                                {{ $post->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>

                                    <flux:dropdown position="bottom" align="end">
                                        <flux:button variant="ghost"
                                            class="border border-neutral-200 dark:border-neutral-700 rounded-lg">
                                            <flux:icon.ellipsis-vertical />
                                        </flux:button>
                                        <flux:navmenu>
                                            <flux:navmenu.item icon="pencil">Edit</flux:navmenu.item>
                                            <flux:navmenu.item icon="eye">View Details</flux:navmenu.item>
                                            <flux:navmenu.item icon="trash" variant="danger">Delete</flux:navmenu.item>
                                        </flux:navmenu>
                                    </flux:dropdown>
                                </div>

                                <div class="prose dark:prose-invert max-w-none">
                                    <p>{{ $post->content }}</p>
                                </div>
                            </div>
                        @empty
                            <div
                                class="p-8 border border-neutral-200 dark:border-neutral-700 rounded-xl text-center bg-white dark:bg-neutral-800/50">
                                <flux:icon.chat-bubble-left-ellipsis class="mx-auto h-12 w-12 text-neutral-400" />
                                <h3 class="mt-2 text-lg font-medium">No announcements yet</h3>
                                <p class="mt-1 text-neutral-500 dark:text-neutral-400">
                                    Create your first announcement to get started.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
        @endif

            <!-- Sidebar with Stats (moved to right) -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Upcoming Card -->
                <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                    <div class="flex items-center">
                        <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-xl mr-3">
                            <flux:icon.clipboard-document-check />
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Upcoming</h2>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Next class activities</p>
                        </div>
                    </div>
                    <div class="border-t border-neutral-200 dark:border-neutral-700 mt-4 pt-3">
                        <p class="text-sm">No upcoming events</p>
                    </div>
                </div>

                <!-- Attendance Rate Card -->
                <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                    <div class="flex items-center">
                        <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-xl mr-3">
                            <flux:icon.presentation-chart-line />
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">85%</h2>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Attendance Rate</p>
                        </div>
                    </div>
                </div>

                <!-- Course Progress Card -->
                <div class="rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
                    <div class="flex items-center">
                        <div class="p-3 border border-neutral-200 dark:border-neutral-700 rounded-xl mr-3">
                            <flux:icon.calendar-days />
                        </div>
                        <div>
                            <h2 class="font-bold text-lg">Course Progress</h2>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">45% completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Background Modal -->
    <flux:modal name="edit-background" class="md:max-w-md">
        <div class="space-y-6">
            <flux:heading size="lg">Edit Course Banner</flux:heading>
            <p class="text-sm text-neutral-500 dark:text-neutral-400 mt-1">
                Choose a new banner image for your course.
            </p>

            <div class="space-y-4">
                <flux:input type="url" label="Image URL" placeholder="Paste an image URL" />

                <div class="border border-dashed border-neutral-300 dark:border-neutral-600 rounded-lg p-6 text-center">
                    <flux:icon.arrow-up-tray class="mx-auto h-8 w-8 text-neutral-400" />
                    <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                        Drag and drop an image or click to browse
                    </p>
                    <flux:button variant="ghost" size="sm" class="mt-2">Browse Files</flux:button>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-neutral-200 dark:border-neutral-700">
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Save Changes</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
