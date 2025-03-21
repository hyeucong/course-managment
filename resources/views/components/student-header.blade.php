<flux:header class="sticky top-0 block!  bg-stone-100 border-b border-zinc-200 no-scrollbar">
    <flux:navbar scrollable>
        <flux:navbar.item :href="route('student.stream', $course->id)" :current="$activeTab === 'stream'" wire:navigate
            :accent="false">
            Stream</flux:navbar.item>
        <flux:navbar.item :href="route('student.classwork', $course->id)" :current="$activeTab === 'classwork'"
            wire:navigate :accent="false">
            Classwork</flux:navbar.item>
    </flux:navbar>
</flux:header>
