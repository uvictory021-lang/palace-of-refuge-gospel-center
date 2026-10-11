@extends('layouts.dashboard')

@section('title', 'Overview')

@section('content')
    <div class="mb-8">
        <p class="text-sm text-charcoal/50">{{ now()->format('l, F j, Y') }}</p>
        <h2 class="mt-1 font-display text-2xl font-semibold text-burgundy-dark sm:text-3xl">
            Welcome back, {{ explode(' ', $user->name)[0] }}
        </h2>
        <p class="mt-1 text-sm capitalize text-charcoal/50">{{ $user->role }} · Palace Of Refuge Gospel Center</p>
    </div>

    <section class="mb-10">
        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-charcoal/40">At a Glance</h3>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <x-dashboard.stat-card label="Total Teachings" :value="$stats['total_teachings']" />
            <x-dashboard.stat-card label="Published Teachings" :value="$stats['published_teachings']" />
            <x-dashboard.stat-card label="Upcoming Programs" :value="$stats['upcoming_programs']" />
            <x-dashboard.stat-card label="Announcements" :value="$stats['announcements']" />
            <x-dashboard.stat-card label="New Prayer Requests" :value="$stats['new_prayer_requests']" hint="Awaiting review" />
            <x-dashboard.stat-card label="New Contact Messages" :value="$stats['new_contact_messages']" hint="Unread" />
        </div>
    </section>

    <section class="mb-10">
        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-charcoal/40">Quick Actions</h3>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
            <x-dashboard.quick-action label="Add Sermon" description="Publish a new sermon" />
            <x-dashboard.quick-action label="Add Palace Guard" description="Publish a new teaching" />
            <x-dashboard.quick-action label="Add Program" description="Schedule an event" :disabled="false" href="{{ route('programs.create') }}" />
            <x-dashboard.quick-action label="Post Announcement" description="Share church news" :disabled="false" href="{{ route('announcements.create') }}" />
        </div>
    </section>

    <section>
        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-charcoal/40">Recent Activity</h3>
                <div class="rounded-brand-lg border border-dashed border-burgundy/15 bg-ivory p-8 text-center">
            <p class="text-sm text-charcoal/50">
                Recent teachings, programs, and announcements will appear here once content management is built.
            </p>
        </div>
    </section>
@endsection
