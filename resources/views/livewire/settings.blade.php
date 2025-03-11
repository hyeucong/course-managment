<div class="relative mb-6 w-full">
    <x-course-header :course="$course" :activeTab="$activeTab" />

    <div class="p-6">
        <div class="flex">
            <div class="mr-10 w-full pb-4 md:w-[220px]">
                <flux:navlist>
                    <flux:navlist.item wire:click="$set('settingsTab', 'details')" :current="$settingsTab === 'details'">
                        Details
                    </flux:navlist.item>
                    <flux:navlist.item wire:click="$set('settingsTab', 'appearance')"
                        :current="$settingsTab === 'appearance'">
                        Appearance
                    </flux:navlist.item>
                </flux:navlist>
            </div>

            <div>
                <div x-cloak x-show="$wire.settingsTab === 'details'">
                    <h2 class="text-2xl font-bold mb-4">Profile Settings</h2>
                    <!-- Add your profile settings form here -->
                    <p>Profile settings content goes here.</p>
                </div>

                <div x-cloak x-show="$wire.settingsTab === 'appearance'">
                    <h2 class="text-2xl font-bold mb-4">Appearance Settings</h2>
                    <!-- Add your appearance settings form here -->
                    <p>Appearance settings content goes here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
