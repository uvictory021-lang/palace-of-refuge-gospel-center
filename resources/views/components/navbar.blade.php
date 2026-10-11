@php
    $navItems = [
        ['label' => 'Home', 'route' => 'home', 'fallback' => '/'],
        ['label' => 'About', 'route' => 'about', 'fallback' => '#'],
        ['label' => 'Sermons', 'route' => 'sermons.index', 'fallback' => '#'],
        ['label' => 'Palace Guard', 'route' => 'palace-guard.index', 'fallback' => '#'],
        ['label' => 'Programs', 'route' => 'programs.index', 'fallback' => '#'],
        ['label' => 'News', 'route' => 'news.index', 'fallback' => '#'],
        ['label' => 'Prayer', 'route' => 'prayer.create', 'fallback' => '#'],
        ['label' => 'Contact', 'route' => 'contact', 'fallback' => '#'],
    ];

    $navLinks = collect($navItems)->map(function ($item) {
        $hasRoute = \Illuminate\Support\Facades\Route::has($item['route']);
        return [
            'label' => $item['label'],
            'href' => $hasRoute ? route($item['route']) : $item['fallback'],
            'active' => $hasRoute
                ? request()->routeIs($item['route'])
                : ($item['fallback'] === '/' && request()->is('/')),
        ];
    })->all();

    $giveHref = \Illuminate\Support\Facades\Route::has('give') ? route('give') : '#';
@endphp

<header
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50 border-b border-gold/15 bg-burgundy-dark shadow-brand-sm"
>
    <nav class="container-site flex h-16 items-center justify-between lg:h-20" aria-label="Primary">
        <a href="{{ url('/') }}" class="flex shrink-0 items-center gap-3" aria-label="Palace Of Refuge Gospel Center — home">
            <x-logo class="h-10 w-10 lg:h-12 lg:w-12" />
            <span class="hidden flex-col leading-tight sm:flex">
                <span class="font-display text-base font-semibold text-cream lg:text-lg">Palace Of Refuge</span>
                <span class="text-[0.65rem] uppercase tracking-[0.18em] text-gold/80 lg:text-xs">Gospel Center</span>
            </span>
        </a>

        {{-- Desktop navigation --}}
        <ul class="hidden items-center gap-8 lg:flex">
            @foreach ($navLinks as $link)
                <li>
                    <a href="{{ $link['href'] }}" @if($link['active']) aria-current="page" @endif class="nav-link">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hidden lg:block">
            <a href="{{ $giveHref }}" class="btn-gold">Give</a>
        </div>

        {{-- Mobile toggle --}}
        <button
            type="button"
            class="inline-flex items-center justify-center rounded-brand-sm p-2 text-cream lg:hidden"
            :aria-expanded="mobileOpen.toString()"
            aria-controls="mobile-nav"
            aria-label="Toggle navigation menu"
            @click="mobileOpen = !mobileOpen"
        >
            <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
            </svg>
            <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>

    {{-- Mobile panel --}}
    <div
        id="mobile-nav"
        x-show="mobileOpen"
        x-cloak
        x-transition:enter="transition ease-brand duration-[220ms]"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-brand duration-[220ms]"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @keydown.escape.window="mobileOpen = false"
        class="border-t border-gold/15 bg-burgundy-dark lg:hidden"
    >
        <ul class="container-site flex flex-col gap-1 py-4">
            @foreach ($navLinks as $link)
                <li>
                    
                        href="{{ $link['href'] }}"
                        @if($link['active']) aria-current="page" @endif
                        class="nav-link block rounded-brand-sm px-3 py-2.5"
                        @click="mobileOpen = false"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
            <li class="pt-2">
                <a href="{{ $giveHref }}" class="btn-gold w-full" @click="mobileOpen = false">Give</a>
            </li>
        </ul>
    </div>
</header>
