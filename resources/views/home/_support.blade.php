@php $giveHref = \Illuminate\Support\Facades\Route::has('give') ? route('give') : '#'; @endphp

<x-reveal as="section" aria-labelledby="support-heading" class="bg-gradient-to-br from-purple-dark via-burgundy to-burgundy-dark py-20 text-center sm:py-28">
    <div class="container-site max-w-2xl">
        <x-eyebrow tone="dark">Support The Ministry</x-eyebrow>
        <h2 id="support-heading" class="mt-4 font-display text-3xl font-semibold text-ivory sm:text-4xl">
            Partner With Us
        </h2>
        <p class="mt-4 text-base leading-relaxed text-cream/75">
            Your generosity helps sustain the ministry's work. Giving options and details will be made available
            here once provided by the church.
        </p>
        <a href="{{ $giveHref }}" class="btn-gold mt-8 inline-flex">Support The Ministry</a>
    </div>
</x-reveal>