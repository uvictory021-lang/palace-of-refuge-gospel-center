@props(['title' => 'Dashboard'])

<header class="sticky top-0 z-30 flex h-16 items-center gap-4 border-b border-burgundy/10 bg-ivory/90 px-4 backdrop-blur sm:px-6 lg:px-8">
    <button
        type="button"
        @click="sidebarOpen = true"
        class="rounded-brand p-2 text-burgundy transition-colors duration-[220ms] ease-brand hover:bg-burgundy/5 lg:hidden"
        aria-label="Open menu"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
        </svg>
    </button>

    <div class="min-w-0 flex-1">
        <h1 class="truncate font-display text-lg font-semibold text-burgundy-dark sm:text-xl">
            {{ $title }}
        </h1>
    </div>

    <p class="hidden text-sm text-charcoal/50 sm:block">
        {{ now()->format('l, F j, Y') }}
    </p>
</header>