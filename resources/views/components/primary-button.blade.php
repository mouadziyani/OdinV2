<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => '
        inline-flex items-center px-8 py-3 
        bg-gradient-to-r from-blue-600 to-indigo-600 
        hover:from-blue-700 hover:to-indigo-700 
        border border-transparent 
        rounded-2xl 
        font-black text-[10px] uppercase tracking-[0.2em] 
        text-white 
        shadow-lg shadow-blue-500/25 
        hover:shadow-blue-500/40 
        focus:outline-none focus:ring-4 focus:ring-blue-500/20 
        transition-all duration-300 
        active:scale-95 
        disabled:opacity-50
    '
]) }}>
    {{ $slot }}
</button>