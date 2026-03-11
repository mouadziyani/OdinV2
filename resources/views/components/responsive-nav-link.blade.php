@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-3 border-s-4 border-blue-600 dark:border-blue-400 text-start text-sm font-black uppercase tracking-widest text-blue-700 dark:text-blue-400 bg-blue-50/50 dark:bg-blue-900/20 focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-3 border-s-4 border-transparent text-start text-sm font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex items-center gap-3">
        {{ $slot }}
    </div>
</a>