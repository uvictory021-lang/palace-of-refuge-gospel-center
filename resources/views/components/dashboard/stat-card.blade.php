@props(['label', 'value', 'hint' => null])

<div class="rounded-brand-lg border border-burgundy/10 bg-ivory p-5 shadow-brand-sm">
    <p class="text-xs font-medium uppercase tracking-wide text-charcoal/50">{{ $label }}</p>
    <p class="mt-2 font-display text-3xl font-semibold text-burgundy-dark">{{ $value }}</p>
    @if ($hint)
        <p class="mt-1 text-xs text-charcoal/40">{{ $hint }}</p>
    @endif
</div>