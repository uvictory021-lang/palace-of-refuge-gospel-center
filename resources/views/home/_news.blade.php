@php $newsHref = \Illuminate\Support\Facades\Route::has('news.index') ? route('news.index') : '#'; @endphp

<x-reveal as="section" aria-labelledby="news-heading" class="bg-cream py-20 sm:py-28">
    <div class="container-site">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <x-eyebrow>Stay Connected</x-eyebrow>
                <h2 id="news-heading" class="mt-4 font-display text-3xl font-semibold text-charcoal sm:text-4xl">
                    Announcements &amp; News
                </h2>
            </div>
            <a href="{{ $newsHref }}" class="btn-outline-burgundy">View All News</a>
        </div>

        <ul class="mt-10 divide-y divide-burgundy/10 border-y border-burgundy/10">
            @foreach ($news as $item)
                <li class="flex flex-col gap-3 py-6 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-start gap-4">
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-gold" aria-hidden="true"></span>
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-wide text-burgundy">{{ $item['category'] }} &middot; {{ $item['date'] }}</span>
                            <h3 class="mt-1 font-display text-lg font-semibold text-charcoal">{{ $item['title'] }}</h3>
                            <p class="mt-1 max-w-2xl text-sm text-charcoal/70">{{ $item['excerpt'] }}</p>
                        </div>
                    </div>
                    <a href="#" class="inline-flex shrink-0 items-center gap-1 self-start text-sm font-medium text-burgundy transition-colors duration-[220ms] hover:text-gold-dark sm:self-center">
                        Read More
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-reveal>