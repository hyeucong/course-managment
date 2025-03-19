<flux:header
    class="sticky top-0 block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 ">
    <flux:navbar scrollable>
        <flux:navbar.item :href="route('student.stream', $course->id)" :current="$activeTab === 'stream'" wire:navigate>
            Stream</flux:navbar.item>
        <flux:navbar.item :href="route('student.classwork', $course->id)" :current="$activeTab === 'classwork'"
            wire:navigate>
            Classwork</flux:navbar.item>
    </flux:navbar>
</flux:header>
