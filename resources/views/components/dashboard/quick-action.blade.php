@props(['label', 'description' => null, 'disabled' => true])

@if ($disabled)
    <div class="flex items-start gap-3 rounded-brand-lg border border-dashed border-burgundy/15 bg-cream/40 p-4">
        <div class="flex-1">
            <p class="text-sm font-medium text-charcoal/50">{{ $label }}</p>
            @if ($description)
                <p class="mt-0.5 text-xs text-charcoal/35">{{ $description }}</p>
            @endif
        </div>
        <span class="shrink-0 rounded-full border border-burgundy/15 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-charcoal/40">
            Soon
        </span>
    </div>
@else
        <a href="{{ $attributes->get('href', '#') }}" class="group flex items-start gap-3 rounded-brand-lg border border-burgundy/10 bg-ivory p-4 shadow-brand-sm transition-colors duration-[220ms] ease-brand hover:border-gold hover:bg-gold/5">
        <div class="flex-1">
            <p class="text-sm font-medium text-burgundy-dark group-hover:text-gold-dark">{{ $label }}</p>
            @if ($description)
                <p class="mt-0.5 text-xs text-charcoal/50">{{ $description }}</p>
            @endif
        </div>
    </a>
@endif