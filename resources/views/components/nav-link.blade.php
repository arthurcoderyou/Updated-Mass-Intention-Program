@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-gray-800 font-medium text-black focus:outline-none dark:border-neutral-200 dark:text-neutral-200'
            : 'py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-transparent text-black hover:text-customBlue focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} target="_self">
    {{ $slot }}
</a>
