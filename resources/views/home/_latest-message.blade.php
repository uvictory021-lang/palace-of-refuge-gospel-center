@php $sermonsHref = \Illuminate\Support\Facades\Route::has('sermons.index') ? route('sermons.index') : '#'; @endphp

<x-reveal as="section" aria-labelledby="latest-message-heading" class="bg-cream py-20 sm:py-28">
    <div class="container-site">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <x-eyebrow>Latest Message</x-eyebrow>
                <h2 id="latest-message-heading" class="mt-4 font-display text-3xl font-semibold text-charcoal sm:text-4xl">
                    {{ $message['title'] }}
                </h2>
            </div>
            <a href="{{ $sermonsHref }}" class="text-sm font-medium text-burgundy underline underline-offset-4 transition-colors duration-[220ms] hover:text-gold-dark">
                View All Messages
            </a>
        </div>

        <div class="mt-10 grid overflow-hidden rounded-brand-lg border border-burgundy/10 bg-ivory shadow-brand lg:grid-cols-[1.1fr_1fr]">
            <div class="relative">
                <x-media-panel icon="play" class="aspect-video lg:aspect-auto lg:h-full" />
                <button type="button" class="group absolute inset-0 flex items-center justify-center" aria-label="Play latest message: {{ $message['title'] }}">
                    <span class="flex h-16 w-16 items-center justify-center rounded-full border border-gold/60 bg-burgundy-dark/70 text-gold transition-transform duration-[220ms] ease-brand group-hover:scale-105 group-hover:bg-burgundy-dark/90">
                        <x-icon name="play" class="h-6 w-6" />
                    </span>
                </button>
            </div>

            <div class="flex flex-col justify-center p-8 sm:p-10">
                <span class="inline-flex w-fit rounded-brand-sm bg-burgundy/10 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-burgundy">
                    {{ $message['category'] ?? 'Sunday Service' }}
                </span>
                <p class="mt-4 text-sm leading-relaxed text-charcoal/75">
                    {{ $message['description'] ?? '[Sample description — replace with the real sermon summary]' }}
                </p>
                <dl class="mt-6 grid grid-cols-2 gap-4 text-sm text-charcoal/70">
                    <div>
                        <dt class="font-semibold text-charcoal">Speaker</dt>
                        <dd>{{ $message['speaker'] ?? '[Speaker — to be added]' }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-charcoal">Date</dt>
                        <dd>{{ $message['date'] ?? '[Date — to be added]' }}</dd>
                    </div>
                </dl>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ $message['video_url'] ?? '#' }}" class="btn-gold">Watch Message</a>
                    <a href="{{ $message['audio_url'] ?? '#' }}" class="btn-outline-burgundy">Read Message</a>
                </div>
            </div>
        </div>
    </div>
</x-reveal>