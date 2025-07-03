@props(['active'])

@php
$classes = ($active ?? false)
            ? "text-white px-4 py-2 rounded-lg text-sm font-medium bg-blue-900 bg-opacity-30 hover:bg-opacity-50 transition" : "text-blue-100 hover:text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

