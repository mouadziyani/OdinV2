@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'mt-2 p-2 bg-red-50 dark:bg-red-900/10 border-l-2 border-red-500 rounded-r-lg']) }}>
        <ul class="space-y-1">
            @foreach ((array) $messages as $message)
                <li class="flex items-start gap-2 text-[11px] font-bold uppercase tracking-tight text-red-700 dark:text-red-400">
                    <svg class="w-3.5 h-3.5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>{{ $message }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif