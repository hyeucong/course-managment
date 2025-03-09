<flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:navbar scrollable>
        <flux:navbar.item href="{{route('course', $this->course->id)}}" :current="request()->routeIs('course')"
            wire:navigate> Overview</flux:navbar.item>
        <flux:navbar.item href="{{route('stream', $this->course->id)}}" :current="request()->routeIs('stream')"
            wire:navigate>Stream</flux:navbar.item>
        <flux:navbar.item href="#">Attendance</flux:navbar.item>
        <flux:navbar.item badge="32" href="#">People</flux:navbar.item>
        <flux:navbar.item href="#">Grades</flux:navbar.item>
        <flux:navbar.item href="#">Details</flux:navbar.item>
        <flux:navbar.item href="#">Settings</flux:navbar.item>
    </flux:navbar>
</flux:header>
