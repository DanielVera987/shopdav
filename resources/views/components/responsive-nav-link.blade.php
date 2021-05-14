@props(['active'])

@php
$classes = ($active ?? false)
            ? 'pl-3 inline-block no-underline hover:text-black'
            : 'pl-3 inline-block no-underline hover:text-black';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
