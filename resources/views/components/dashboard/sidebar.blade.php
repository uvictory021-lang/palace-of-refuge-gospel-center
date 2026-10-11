@php
    $navItems = [
        ['label' => 'Overview', 'route' => 'dashboard'],
        ['label' => 'Sermons', 'route' => 'teachings.index', 'query' => ['type' => 'sermon']],
        ['label' => 'Palace Guard', 'route' => 'teachings.index', 'query' => ['type' => 'palace_guard']],
        ['label' => 'Programs', 'route' => 'programs.index'],
        ['label' => 'Announcements', 'route' => 'announcements.index'],
        ['label' => 'Quote Cards', 'route' => 'quote-cards.index'],
        ['label' => 'Prayer Requests'],
        ['label' => 'Contact Messages'],
        ['label' => 'Giving Information'],
        ['label' => 'Site Settings'],
    ];
@endphp

<aside class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-40 lg:flex lg:w-72 lg:flex-col border-r border-burgundy-dark/10 bg-gradient-to-b from-burgundy-dark to-purple-dark">
    <div class="flex items-center gap-3 border-b border-cream/10 px-6 py-6">
        <x-logo class="h-9 w-9" />
        <div>
            <p class="font-display text-sm font-semibold tracking-wide text-cream">Palace Of Refuge</p>
            <p class="text-xs text-gold/80">Ministry Dashboard</p>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 py-6">
        <ul class="space-y-1">
            @foreach ($navItems as $item)
                @php
                    $isActive = isset($item['route'])
                        && request()->routeIs($item['route'])
                        && (! isset($item['query']['type']) || request('type') === $item['query']['type']);
                @endphp
                <li>
                    @if (isset($item['route']))
                        <a
                            href="{{ route($item['route'], $item['query'] ?? []) }}"
                            @class([
                                'block rounded-brand border-l-2 px-3 py-2.5 text-sm font-medium transition-colors duration-[220ms] ease-brand',
                                'border-gold bg-gold/10 text-gold' => $isActive,
                                'border-transparent text-cream/80 hover:bg-cream/5 hover:text-gold' => ! $isActive,
                            ])
                        >
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="flex items-center justify-between rounded-brand border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-cream/35">
                            {{ $item['label'] }}
                            <span class="rounded-full border border-cream/15 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-cream/40">
                                Soon
                            </span>
                        </span>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="border-t border-cream/10 px-4 py-4">
        <div class="mb-3 px-2">
            <p class="truncate text-sm font-medium text-cream">{{ auth()->user()->name }}</p>
            <p class="truncate text-xs capitalize text-gold/70">{{ auth()->user()->role }}</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center rounded-brand px-3 py-2.5 text-sm font-medium text-cream/70 transition-colors duration-[220ms] ease-brand hover:bg-cream/5 hover:text-gold">
                Log out
            </button>
        </form>
    </div>
</aside>