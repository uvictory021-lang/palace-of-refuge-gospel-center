@props(['as' => 'div'])
@php $tag = $as; @endphp
<{{ $tag }}
    x-data="{ revealed: false }"
    x-init="const io = new IntersectionObserver(([entry]) => { if (entry.isIntersecting) { revealed = true; io.disconnect(); } }, { threshold: 0.15 }); io.observe($el)"
    :class="revealed ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
    {{ $attributes->merge(['class' => 'transition-all duration-700 ease-brand motion-reduce:transition-none motion-reduce:opacity-100 motion-reduce:translate-y-0']) }}
>
    {{ $slot }}
</{{ $tag }}>