<button {{ $attributes->merge([
    'type' => 'button', 
    'class' => '
        inline-flex items-center px-6 py-3 
        bg-white dark:bg-gray-900 
        border border-gray-200 dark:border-gray-700 
        rounded-2xl 
        font-black text-[10px] uppercase tracking-[0.15em] 
        text-gray-600 dark:text-gray-400 
        shadow-sm 
        hover:bg-gray-50 dark:hover:bg-gray-800 
        hover:text-blue-600 dark:hover:text-blue-400 
        hover:border-blue-200 dark:hover:border-blue-900
        focus:outline-none focus:ring-4 focus:ring-blue-500/10 
        disabled:opacity-25 
        transition-all duration-200 active:scale-95
    '
]) }}>
    {{ $slot }}
</button>