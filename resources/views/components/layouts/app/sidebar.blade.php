<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen">
        <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('courses') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group class="grid">
                    @if(request()->is('student/*'))
                        <flux:navlist.item icon="academic-cap" :href="route('courses')"
                            :current="request()->routeIs('courses') || request()->is('student/*')" wire:navigate>
                            Courses
                        </flux:navlist.item>
                    @else
                        <flux:navlist.item icon="academic-cap" :href="route('courses')"
                            :current="request()->routeIs('courses') || request()->is('courses/*')" wire:navigate>
                            Courses
                        </flux:navlist.item>
                        <flux:navlist.item icon="credit-card" :href="route('billing')"
                            :current="request()->routeIs('billing')" wire:navigate>Billing
                        </flux:navlist.item>
                    @endif

                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            @if (request()->is('student/*'))

            @else
                <flux:navlist variant="outline">
                    <flux:navlist.item icon="archive-box" :href="route('billing')" :current="request()->routeIs('archived')"
                        wire:navigate>Archived
                    </flux:navlist.item>
                </flux:navlist>
            @endif
            <!-- Desktop User Menu -->
            @if(request()->is('student/*'))

            @else
                <flux:dropdown position="bottom" align="start">
                    <flux:profile :name="auth()->user()->name" :avatar="auth()->user()->avatar ?: null"
                        :initials="auth()->user()->initials()" icon-trailing="chevrons-up-down" />

                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-sm">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black">
                                            @if (auth()->user()->avatar)
                                                <img src="{{ auth()->user()->avatar }}" />
                                            @else
                                                {{ auth()->user()->initials() }}
                                            @endif
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-left text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                Log Out
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            @endif
        </flux:sidebar>

        <!-- Mobile User Menu -->
        @if(request()->is('student/*'))

        @else
            <flux:header class="lg:hidden">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                <flux:spacer />

                <flux:dropdown position="top" align="end">
                    <flux:profile :avatar="auth()->user()->avatar ?: null" :initials="auth()->user()->initials()"
                        icon-trailing="chevron-down" />

                    <flux:menu>
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-sm">
                                        @if (auth()->user()->avatar)
                                            <img src="{{ auth()->user()->avatar }}" />
                                        @else
                                            <span
                                                class="flex h-full w-full items-center justify-center rounded-sm bg-neutral-200 text-black">
                                                {{ auth()->user()->initials() }}
                                            </span>
                                        @endif
                                    </span>

                                    <div class="grid flex-1 text-left text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                Log Out
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:header>
        @endif

        {{ $slot }}

        @fluxScripts
    </body>

</html>
