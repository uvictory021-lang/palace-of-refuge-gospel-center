@props(['status'])

@php
    $styles = [
        'published' => 'border-emerald-200 bg-emerald-50 text-emerald-700',
        'draft' => 'border-charcoal/10 bg-charcoal/5 text-charcoal/60',
    ];
    $style = $styles[$status] ?? $styles['draft'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium capitalize {$style}"]) }}>
    {{ $status }}
</span>