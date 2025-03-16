@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-600 hover:text-blue-600 px-4 py-2 rounded-md'
            : 'text-gray-600 hover:text-blue-600 hover:border hover:border-text-gray px-4 py-2 rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

