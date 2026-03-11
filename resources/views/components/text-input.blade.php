@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => '
        block w-full px-4 py-3 
        bg-gray-50 dark:bg-gray-950 
        border-gray-200 dark:border-gray-800 
        text-gray-900 dark:text-gray-100 
        placeholder-gray-400 dark:placeholder-gray-600
        rounded-2xl shadow-sm 
        transition-all duration-200
        focus:bg-white dark:focus:bg-gray-900
        focus:ring-4 focus:ring-blue-500/10 
        focus:border-blue-500 dark:focus:border-blue-400
        disabled:opacity-50 disabled:bg-gray-100 dark:disabled:bg-gray-800
    '
]) }}>