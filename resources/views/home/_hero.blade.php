@php
    $watchHref = \Illuminate\Support\Facades\Route::has('sermons.index') ? route('sermons.index') : '#';
    $visitHref = \Illuminate\Support\Facades\Route::has('about') ? route('about') : '#';
@endphp

<section aria-labelledby="hero-heading" class="relative flex min-h-svh items-center overflow-hidden bg-gradient-to-b from-burgundy-dark via-burgundy to-purple-dark">
    <x-icon name="cross" class="pointer-events-none absolute left-1/2 top-1/2 h-[130vw] w-[130vw] -translate-x-1/2 -translate-y-1/2 text-gold/[0.04] sm:h-[70vw] sm:w-[70vw]" />

    <div class="container-site relative z-10 flex flex-col items-center py-24 text-center">
        <div
            x-data="{ shown: false }"
            x-init="requestAnimationFrame(() => shown = true)"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
            class="flex flex-col items-center transition-all duration-700 ease-brand motion-reduce:transition-none motion-reduce:opacity-100 motion-reduce:translate-y-0"
        >
            <x-logo class="h-16 w-16 sm:h-20 sm:w-20" />

            <p class="mt-6 text-xs font-semibold uppercase tracking-[0.3em] text-gold/90 sm:text-sm">Gospel Center</p>
            <h1 id="hero-heading" class="mt-3 font-display text-4xl font-semibold leading-[1.05] text-ivory sm:text-6xl lg:text-7xl">
                Palace Of Refuge
            </h1>
            <p class="mt-5 max-w-xl font-display text-lg italic text-gold sm:text-2xl">
                &ldquo;The Wealthy Place Of Word And Power&rdquo;
            </p>
            <p class="mt-6 max-w-lg text-balance text-sm leading-relaxed text-cream/80 sm:text-base">
                A place of refuge, transformation, and the uncompromised Word of God.
            </p>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                <a href="{{ $watchHref }}" class="btn-gold">
                    <x-icon name="play" class="h-4 w-4" />
                    Watch Latest Message
                </a>
                <a href="{{ $visitHref }}" class="btn-outline-cream">Plan Your Visit</a>
            </div>
        </div>
    </div>

    <div class="absolute inset-x-0 bottom-6 z-10 hidden justify-center sm:flex" aria-hidden="true">
        <span class="h-9 w-5 rounded-full border border-cream/30">
            <span class="mx-auto mt-1.5 block h-1.5 w-1.5 animate-bounce rounded-full bg-gold motion-reduce:animate-none"></span>
        </span>
    </div>
</section>