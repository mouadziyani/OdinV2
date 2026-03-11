@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'flex items-center gap-3 p-4 mb-6 bg-emerald-50 dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-800 rounded-2xl animate-fade-in-down']) }}>
        <div class="p-1.5 bg-emerald-500 rounded-lg shadow-sm shadow-emerald-500/30">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <p class="text-[11px] font-black uppercase tracking-widest text-emerald-700 dark:text-emerald-400 leading-none">
            {{ $status }}
        </p>
    </div>
@endif