@php $guardHref = \Illuminate\Support\Facades\Route::has('palace-guard.index') ? route('palace-guard.index') : '#'; @endphp

<x-reveal as="section" aria-labelledby="palace-guard-heading" class="bg-purple-dark py-20 sm:py-28">
    <div class="container-site grid items-center gap-10 lg:grid-cols-[1fr_1.1fr]">
        <div>
            <x-eyebrow tone="dark">Palace Guard</x-eyebrow>
            <h2 id="palace-guard-heading" class="mt-4 font-display text-3xl font-semibold text-ivory sm:text-4xl">
                {{ $teaching['title'] }}
            </h2>
            <p class="mt-5 max-w-lg text-sm leading-relaxed text-cream/75 sm:text-base">
                {{ $teaching['description'] ?? '[Sample teaching description — replace with real Palace Guard content]' }}
            </p>
            <dl class="mt-6 flex flex-wrap gap-x-8 gap-y-3 text-sm text-cream/70">
                <div>
                    <dt class="font-semibold text-gold">Category</dt>
                    <dd>{{ $teaching['category'] ?? 'Discipleship Teaching' }}</dd>
                </div>
                <div>
                    <dt class="font-semibold text-gold">Date</dt>
                    <dd>{{ $teaching['date'] ?? '[Date — to be added]' }}</dd>
                </div>
            </dl>
            <a href="{{ $guardHref }}" class="btn-gold mt-8 inline-flex">
                Explore Palace Guard
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>

        <x-media-panel icon="shield" class="aspect-[4/3] rounded-brand-lg shadow-brand" />
    </div>
</x-reveal>