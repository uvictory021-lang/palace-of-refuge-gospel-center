@props(['name', 'class' => 'h-6 w-6'])
@php
    $icons = [
        'cross' => '<path d="M12 3v18M7.5 8.5h9" />',
        'heart' => '<path d="M12 20s-7-4.35-9.5-9A5 5 0 0 1 12 6a5 5 0 0 1 9.5 5C19 15.65 12 20 12 20Z" />',
        'crown' => '<path d="M4 18h16l-1.6-8-4 3-2.4-5-2.4 5-4-3L4 18Z" />',
        'shield' => '<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3Z" />',
        'play' => '<circle cx="12" cy="12" r="9" /><path d="M10 8.3v7.4l6.5-3.7-6.5-3.7Z" fill="currentColor" stroke="none" />',
        'calendar' => '<rect x="3.5" y="5.5" width="17" height="15" rx="2" /><path d="M3.5 10h17M8 3.5v4M16 3.5v4" />',
        'pin' => '<path d="M12 21s7-6.5 7-12a7 7 0 1 0-14 0c0 5.5 7 12 7 12Z" /><circle cx="12" cy="9" r="2.5" />',
        'flame' => '<path d="M12 3c2.5 3 4 5.5 4 8a4 4 0 1 1-8 0c0-1.2.5-2 1.3-2.9C9.8 9.4 10.6 11 11.8 11c-.3-2.8.2-5.1.2-8Z" />',
        'quote' => '<path d="M7 7h4v4c0 3-2 5-4 5v-2c1 0 2-1 2-2H7V7Z" /><path d="M14 7h4v4c0 3-2 5-4 5v-2c1 0 2-1 2-2h-2V7Z" />',
        'arrow-right' => '<path d="M4 12h15M13 6l6 6-6 6" />',
    ];
@endphp
<svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.5"
    stroke-linecap="round"
    stroke-linejoin="round"
    {{ $attributes->merge(['class' => $class]) }}
    aria-hidden="true"
>
    {!! $icons[$name] ?? '' !!}
</svg>