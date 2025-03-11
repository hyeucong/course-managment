<flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:navbar scrollable>
        <flux:navbar.item :href="route('course', $course->id)" :current="$activeTab === 'overview'" wire:navigate>
            Overview</flux:navbar.item>
        <flux:navbar.item :href="route('stream', $course->id)" :current="$activeTab === 'stream'" wire:navigate>
            Stream</flux:navbar.item>
        <flux:navbar.item :href="route('attendance', $course->id)" :current="$activeTab === 'attendance'" wire:navigate>
            Attendance</flux:navbar.item>
        <flux:navbar.item badge="32" :href="route('people', $course->id)" :current="$activeTab === 'people'"
            wire:navigate>People</flux:navbar.item>
        <flux:navbar.item :href="route('grades', $course->id)" :current="$activeTab === 'grades'" wire:navigate>
            Grades</flux:navbar.item>
        <flux:navbar.item :href="route('details', $course->id)" :current="$activeTab === 'details'" wire:navigate>
            Details</flux:navbar.item>
        <flux:navbar.item :href="route('settings', $course->id)" :current="$activeTab === 'settings'" wire:navigate>
            Settings</flux:navbar.item>
    </flux:navbar>
</flux:header>
