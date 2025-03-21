<flux:modal name="archived-course" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Archive Course?</flux:heading>
            <flux:subheading>
                <p>You're about to archive this Course.</p>
                <p>You can later edit status on archived tab.</p>
            </flux:subheading>
        </div>
        <div class="flex gap-2">
            <flux:spacer />
            <flux:button type="submit" variant="danger" wire:click="archive({{$course->id}})">Archive Class
            </flux:button>
        </div>
    </div>
</flux:modal>
