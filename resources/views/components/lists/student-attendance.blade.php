@props(['student', 'attendanceStatus', 'attendanceRate'])

<tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/70 transition-colors">
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 bg-neutral-100 dark:bg-neutral-700 rounded-full p-2">
                <flux:icon.user variant="mini" class="size-5 text-neutral-500 dark:text-neutral-400" />
            </div>
            <div class="font-medium text-neutral-900 dark:text-neutral-100">
                {{ $student->first_name }} {{ $student->last_name }}
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-600 dark:text-neutral-400">
        {{ $student->email }}
    </td>
    <td class="px-6 py-4 text-center whitespace-nowrap">
        <flux:select wire:model="attendanceStatus.{{ $student->id }}" class="w-32 mx-auto">
            <flux:select.option value="P">Present</flux:select.option>
            <flux:select.option value="A">Absent</flux:select.option>
            <flux:select.option value="L">Late</flux:select.option>
        </flux:select>
    </td>
    <td class="px-6 py-4 text-center whitespace-nowrap">
        @php
            $color = $attendanceRate >= 80 ? 'success' : ($attendanceRate >= 60 ? 'warning' : 'danger');
        @endphp
        <flux:badge color="{{ $color }}" variant="pill">{{ $attendanceRate }}%</flux:badge>
    </td>
</tr>
