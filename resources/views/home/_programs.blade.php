@php $programsHref = \Illuminate\Support\Facades\Route::has('programs.index') ? route('programs.index') : '#'; @endphp

<x-reveal as="section" aria-labelledby="programs-heading" class="bg-ivory py-20 sm:py-28">
    <div class="container-site">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <x-eyebrow>What's Coming Up</x-eyebrow>
                <h2 id="programs-heading" class="mt-4 font-display text-3xl font-semibold text-charcoal sm:text-4xl">
                    Upcoming Programs
                </h2>
            </div>
            <a href="{{ $programsHref }}" class="btn-outline-burgundy">View All Programs</a>
        </div>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($programs as $program)
                <article class="group flex flex-col overflow-hidden rounded-brand-lg border border-burgundy/10 bg-white shadow-brand-sm transition-shadow duration-[220ms] ease-brand hover:shadow-brand">
                    <div class="relative">
                        <x-media-panel icon="calendar" class="aspect-[16/10]" />
                        <span class="absolute left-4 top-4 rounded-brand-sm bg-ivory/95 px-2 py-1 text-[10px] font-semibold uppercase tracking-wide text-burgundy shadow-brand-sm">
                            Sample Program
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="font-display text-lg font-semibold text-charcoal">{{ $program['title'] }}</h3>
                        <p class="mt-2 flex-1 text-sm leading-relaxed text-charcoal/70">{{ $program['description'] }}</p>
                        <dl class="mt-4 space-y-1.5 text-xs text-charcoal/60">
                            <div class="flex items-center gap-1.5">
                                <x-icon name="calendar" class="h-3.5 w-3.5 text-gold-dark" />
                                <dd>{{ $program['date'] }} &middot; {{ $program['time'] }}</dd>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <x-icon name="pin" class="h-3.5 w-3.5 text-gold-dark" />
                                <dd>{{ $program['location'] }}</dd>
                            </div>
                        </dl>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-reveal>