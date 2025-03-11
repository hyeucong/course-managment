<div class="relative mb-6 w-full">
    <x-course-header :course="$course" />

    <div class="p-6">
        <div class="flex">
            <div class="mr-10 w-full pb-4 md:w-[220px]">
                <flux:navlist>
                    <flux:navlist.item wire:click="$set('activeTab', 'profile')" :current="$activeTab === 'profile'">
                        Details
                    </flux:navlist.item>
                    <flux:navlist.item wire:click="$set('activeTab', 'appearance')"
                        :current="$activeTab === 'appearance'">
                        Appearance
                    </flux:navlist.item>
                </flux:navlist>
            </div>

            <div>
                <div x-show="$wire.activeTab === 'profile'">
                    <h2 class="text-2xl font-bold mb-4">Profile Settings</h2>
                    <!-- Add your profile settings form here -->
                    <p>Profile settings content goes here.</p>
                </div>

                <div x-show="$wire.activeTab === 'appearance'">
                    <h2 class="text-2xl font-bold mb-4">Appearance Settings</h2>
                    <!-- Add your appearance settings form here -->
                    <p>Appearance settings content goes here.</p>
                </div>
            </div>
        </div>
    </div>
</div>
