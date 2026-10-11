<div
    x-show="sidebarOpen"
    x-cloak
    class="fixed inset-0 z-50 lg:hidden"
    role="dialog"
    aria-modal="true"
>
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition-opacity ease-brand duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-brand duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-charcoal/60"
        @click="sidebarOpen = false"
    ></div>

    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-brand duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-brand duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        @keydown.escape.window="sidebarOpen = false"
        class="relative flex h-full w-full max-w-xs flex-col overflow-y-auto bg-gradient-to-b from-burgundy-dark to-purple-dark px-4 py-6"
    >
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <x-logo class="h-8 w-8" />
                <span class="font-display text-sm font-semibold text-cream">Palace Of Refuge</span>
            </div>
            <button
                type="button"
                @click="sidebarOpen = false"
                class="rounded-brand p-2 text-cream/70 hover:bg-cream/10 hover:text-gold"
                aria-label="Close menu"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        @php
            $mobileNavItems = [
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

        <nav class="flex-1">
            <ul class="space-y-1">
                @foreach ($mobileNavItems as $item)
                    @php
                        $isActive = isset($item['route'])
                            && request()->routeIs($item['route'])
                            && (! isset($item['query']['type']) || request('type') === $item['query']['type']);
                    @endphp
                    <li>
                        @if (isset($item['route']))
                            <a
                                href="{{ route($item['route'], $item['query'] ?? []) }}"
                                @click="sidebarOpen = false"
                                @class([
                                    'block rounded-brand px-3 py-3 text-base font-medium transition-colors duration-[220ms] ease-brand',
                                    'bg-gold/15 text-gold' => $isActive,
                                    'text-cream/80 hover:bg-cream/5 hover:text-gold' => ! $isActive,
                                ])
                            >
                                {{ $item['label'] }}
                            </a>
                        @else
                            <span class="flex items-center justify-between rounded-brand px-3 py-3 text-base font-medium text-cream/35">
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

        <form method="POST" action="{{ route('logout') }}" class="mt-6 border-t border-cream/10 pt-4">
            @csrf
            <button type="submit" class="flex w-full items-center rounded-brand px-3 py-3 text-base font-medium text-cream/70 hover:bg-cream/5 hover:text-gold">
                Log out
            </button>
        </form>
    </div>
</div>