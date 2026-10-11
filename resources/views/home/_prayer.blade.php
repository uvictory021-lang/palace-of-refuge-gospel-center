@php
    $prayerHref = \Illuminate\Support\Facades\Route::has('prayer.create') ? route('prayer.create') : '#';
    $contactHref = \Illuminate\Support\Facades\Route::has('contact') ? route('contact') : '#';
@endphp

<x-reveal as="section" aria-labelledby="prayer-heading" class="relative overflow-hidden bg-burgundy-dark py-20 text-center sm:py-28">
    <x-icon name="flame" class="pointer-events-none absolute left-1/2 top-0 h-[60vw] w-[60vw] -translate-x-1/2 -translate-y-1/3 text-gold/[0.05]" />
    <div class="container-site relative">
        <x-eyebrow tone="dark">Prayer &amp; Connect</x-eyebrow>
        <h2 id="prayer-heading" class="mx-auto mt-4 max-w-2xl font-display text-3xl font-semibold text-ivory sm:text-4xl">
            Need Prayer?
        </h2>
        <p class="mx-auto mt-4 max-w-xl text-base leading-relaxed text-cream/75">
            Whatever you're walking through, you don't have to walk through it alone.
        </p>
        <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ $prayerHref }}" class="btn-gold">Submit A Prayer Request</a>
            <a href="{{ $contactHref }}" class="btn-outline-cream">Ask A Question</a>
        </div>
    </div>
</x-reveal>