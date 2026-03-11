<a {{ $attributes->merge([
    'class' => '
        block w-full px-5 py-3 
        text-start text-[11px] font-black uppercase tracking-[0.1em] 
        text-gray-600 dark:text-gray-400 
        hover:bg-blue-50/50 dark:hover:bg-blue-900/20 
        hover:text-blue-700 dark:hover:text-blue-400 
        focus:outline-none focus:bg-blue-50 dark:focus:bg-blue-900/30 
        transition-all duration-200 ease-in-out
        first:rounded-t-xl last:rounded-b-xl
    '
]) }}>
    <div class="flex items-center gap-3">
        {{ $slot }}
    </div>
</a>