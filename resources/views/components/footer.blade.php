<footer class="border-t border-gold/15 bg-burgundy-dark text-cream">
    <div class="border-b border-gold/15">
        <div class="container-site grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-4 lg:py-16">

            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <x-logo class="h-12 w-12" />
                    <span class="flex flex-col leading-tight">
                        <span class="font-display text-lg font-semibold">Palace Of Refuge</span>
                        <span class="text-xs uppercase tracking-[0.18em] text-gold/80">Gospel Center</span>
                    </span>
                </a>
                <p class="mt-4 max-w-xs font-display text-sm italic text-cream/70">
                    &ldquo;The Wealthy Place Of Word And Power&rdquo;
                </p>

                {{-- Placeholder social links — replace hrefs once accounts are confirmed --}}
                <ul class="mt-6 flex items-center gap-4" aria-label="Social media">
                    <li>
                        <a href="#" class="text-cream/60 transition-colors duration-[220ms] ease-brand hover:text-gold" aria-label="Facebook (link coming soon)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 9h2V6h-2c-1.657 0-3 1.343-3 3v2H9v3h2v6h3v-6h2.2l.8-3H14V9z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-cream/60 transition-colors duration-[220ms] ease-brand hover:text-gold" aria-label="Instagram (link coming soon)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                <rect x="4" y="4" width="16" height="16" rx="4" />
                                <circle cx="12" cy="12" r="3.25" />
                                <circle cx="16.2" cy="7.8" r="0.6" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-cream/60 transition-colors duration-[220ms] ease-brand hover:text-gold" aria-label="YouTube (link coming soon)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                                <rect x="3.5" y="6.5" width="17" height="11" rx="3" />
                                <path d="M10.5 9.5l4 2.5-4 2.5v-5z" fill="currentColor" stroke="none" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="font-display text-sm font-semibold uppercase tracking-[0.14em] text-gold">Explore</h2>
                <ul class="mt-4 space-y-2.5 text-sm text-cream/75">
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">About the Church</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Sermons</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Palace Guard</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Programs &amp; Events</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">News</a></li>
                </ul>
            </div>

            <div>
                <h2 class="font-display text-sm font-semibold uppercase tracking-[0.14em] text-gold">Connect</h2>
                <ul class="mt-4 space-y-2.5 text-sm text-cream/75">
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Prayer Requests</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Ask a Question</a></li>
                    <li><a href="#" class="transition-colors duration-[220ms] ease-brand hover:text-gold">Gallery</a></li>
                    <li><a href="#" class="font-medium text-gold hover:text-gold-light">Give / Support the Ministry</a></li>
                </ul>
            </div>

            <div>
                <h2 class="font-display text-sm font-semibold uppercase tracking-[0.14em] text-gold">Visit Us</h2>
                <address class="mt-4 space-y-2 text-sm not-italic text-cream/75">
                    <p>[Church address — to be provided]</p>
                    <p>[Service times — to be provided]</p>
                    <p>[Phone number — to be provided]</p>
                    <p>[Email address — to be provided]</p>
                </address>
            </div>

        </div>
    </div>

    <div class="container-site flex flex-col items-center justify-between gap-3 py-6 text-xs text-cream/50 sm:flex-row">
        <p>&copy; {{ date('Y') }} Palace Of Refuge Gospel Center. All rights reserved.</p>
        <p>The Wealthy Place Of Word And Power</p>
    </div>
</footer>
