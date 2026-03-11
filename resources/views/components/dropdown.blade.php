@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-2 bg-white/95 dark:bg-gray-900/95 backdrop-blur-sm'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$width = match ($width) {
    '48' => 'w-56', // Zadna chwiya f l-width bach l-ktiba t-khwad ra7tha
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-3 {{ $width }} shadow-2xl shadow-blue-500/10 {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        
        <div class="rounded-2xl border border-gray-100 dark:border-gray-800 ring-1 ring-black ring-opacity-5 overflow-hidden {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>