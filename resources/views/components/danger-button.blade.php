<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => '
        inline-flex items-center px-8 py-3 
        bg-red-600 dark:bg-red-500/90 
        hover:bg-red-700 dark:hover:bg-red-600 
        border border-transparent 
        rounded-2xl 
        font-black text-[10px] uppercase tracking-[0.2em] 
        text-white 
        shadow-lg shadow-red-500/20 
        hover:shadow-red-500/40 
        focus:outline-none focus:ring-4 focus:ring-red-500/20 
        transition-all duration-300 
        active:scale-95 
        disabled:opacity-50
    '
]) }}>
    {{ $slot }}
</button>