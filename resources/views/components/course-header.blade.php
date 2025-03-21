<flux:header class="sticky top-0 block!  bg-stone-100 border-b border-zinc-200 no-scrollbar">
    <flux:navbar scrollable>
        <flux:navbar.item :href="route('stream', $course->id)" :current="$activeTab === 'stream'" wire:navigate
            :accent="false">
            Stream</flux:navbar.item>
        <flux:navbar.item :href="route('attendance', $course->id)" :current="$activeTab === 'attendance'" wire:navigate
            :accent="false">
            Attendance</flux:navbar.item>
        <flux:navbar.item badge="" :href="route('people', $course->id)" :current="$activeTab === 'people'" wire:navigate
            :accent="false">
            People</flux:navbar.item>
        <flux:navbar.item :href="route('grades', $course->id)" :current="$activeTab === 'grades'" wire:navigate
            :accent="false">
            Grades</flux:navbar.item>
        <flux:navbar.item :href="route('classwork', $course->id)" :current="$activeTab === 'classwork'" wire:navigate
            :accent="false">
            Classwork</flux:navbar.item>
        <flux:navbar.item :href="route('settings', $course->id)" :current="$activeTab === 'settings'" wire:navigate
            :accent="false">
            Settings</flux:navbar.item>
    </flux:navbar>
</flux:header>
