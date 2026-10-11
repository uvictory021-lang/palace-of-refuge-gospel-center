@props(['tone' => 'light'])
<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] ' . ($tone === 'dark' ? 'text-gold' : 'text-gold-dark')]) }}>
    <span class="h-px w-6 bg-current" aria-hidden="true"></span>
    {{ $slot }}
</span>