@props(['icon' => 'cross'])
<div {{ $attributes->merge(['class' => 'relative flex items-center justify-center overflow-hidden bg-gradient-to-br from-burgundy via-burgundy-dark to-purple-dark']) }} aria-hidden="true">
    <x-icon :name="$icon" class="h-16 w-16 text-gold/25 sm:h-20 sm:w-20" />
</div>