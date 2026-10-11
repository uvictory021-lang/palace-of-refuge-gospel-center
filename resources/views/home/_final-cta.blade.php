@php
    $visitHref = \Illuminate\Support\Facades\Route::has('about') ? route('about') : '#';
    $contactHref = \Illuminate\Support\Facades\Route::has('contact') ? route('contact') : '#';
@endphp

<x-reveal as="section" aria-labelledby="final-cta-heading" class="bg-burgundy-dark py-20 text-center sm:py-24">
    <div class="container-site">
        <span class="mx-auto block h-px w-16 bg-gold/60"></span>
        <h2 id="final-cta-heading" class="mx-auto mt-6 max-w-2xl font-display text-3xl font-semibold text-ivory sm:text-4xl">
            Come And Experience The Word And Power
        </h2>
        <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ $visitHref }}" class="btn-gold">Plan Your Visit</a>
            <a href="{{ $contactHref }}" class="btn-outline-cream">Contact Us</a>
        </div>
    </div>
</x-reveal>