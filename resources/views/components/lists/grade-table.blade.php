<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 bg-neutral-100 rounded-full p-2">
                <flux:icon.user variant="mini" class="size-5 text-neutral-500" />
            </div>
            <div class="font-medium text-neutral-900">
                {{ $student->first_name }} {{ $student->last_name }}
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-600">
        {{ $student->email }}
    </td>
    @foreach($classworks as $classwork)
        <td class="px-6 py-4 text-center whitespace-nowrap">
            @php
                $grade = $grades[$student->id][$classwork->id] ?? null;
            @endphp
            @if($grade !== null)
                <flux:badge variant="pill">{{ $grade }}</flux:badge>
            @else
                <span class="text-neutral-400">-</span>
            @endif
        </td>
    @endforeach
    <td class="px-6 py-4 text-center whitespace-nowrap">
        @php
            $totalGrade = $totalGrades[$student->id] ?? null;
        @endphp
        @if($totalGrade !== null)
            <flux:badge variant="pill">{{ $totalGrade }}</flux:badge>
        @else
            <span class="text-neutral-400">-</span>
        @endif
    </td>
</tr>
