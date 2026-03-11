@props(['value'])

<label {{ $attributes->merge([
    'class' => '
        block 
        text-[10px] 
        font-black 
        uppercase 
        tracking-[0.15em] 
        text-gray-500 
        dark:text-gray-400 
        mb-2 
        ml-1
    '
]) }}>
    {{ $value ?? $slot }}
</label>