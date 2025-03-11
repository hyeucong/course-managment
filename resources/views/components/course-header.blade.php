<flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:navbar scrollable>
        <flux:navbar.item wire:key="nav-overview" :href="route('course', $course->id)"
            :current="request()->routeIs('course')" wire:navigate>
            Overview</flux:navbar.item>
        <flux:navbar.item wire:key="nav-stream" :href="route('stream', $course->id)"
            :current="request()->routeIs('stream')" wire:navigate>
            Stream</flux:navbar.item>
        <flux:navbar.item wire:key="nav-attendance" :href="route('attendance', $course->id)"
            :current="request()->routeIs('attendance')" wire:navigate>Attendance</flux:navbar.item>
        <flux:navbar.item wire:key="nav-people" badge="32" :href="route('people', $course->id)"
            :current="request()->routeIs('people')" wire:navigate>People</flux:navbar.item>
        <flux:navbar.item wire:key="nav-grades" :href="route('grades', $course->id)"
            :current="request()->routeIs('grades')" wire:navigate>
            Grades</flux:navbar.item>
        <flux:navbar.item wire:key="nav-details" :href="route('details', $course->id)"
            :current="request()->routeIs('details')" wire:navigate>
            Details</flux:navbar.item>
        <flux:navbar.item wire:key="nav-settings" :href="route('settings', $course->id)"
            :current="request()->routeIs('settings')" wire:navigate>Settings</flux:navbar.item>
    </flux:navbar>
</flux:header>
