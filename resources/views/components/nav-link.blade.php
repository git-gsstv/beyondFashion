@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-beige-700 text-sm font-medium leading-5 text-beige-900 focus:outline-none focus:border-beige-800 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-beige-800 hover:text-beige-900 hover:border-beige-600 focus:outline-none focus:text-beige-900 focus:border-beige-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>