<x-reveal as="section" aria-labelledby="scripture-heading" class="bg-ivory py-20 sm:py-28">
    <div class="container-site max-w-3xl text-center">
        <x-icon name="quote" class="mx-auto h-8 w-8 text-gold" />
        <blockquote id="scripture-heading" class="mt-6 font-display text-2xl italic leading-snug text-charcoal sm:text-3xl">
            &ldquo;{{ $scripture['text'] }}&rdquo;
        </blockquote>
        <p class="mt-5 text-sm font-semibold uppercase tracking-[0.2em] text-gold-dark">
            {{ $scripture['reference'] }}
        </p>
    </div>
</x-reveal>