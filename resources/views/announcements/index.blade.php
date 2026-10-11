@extends('layouts.dashboard')

@section('title', 'Announcements')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="font-display text-2xl font-semibold text-burgundy-dark">Announcements</h2>
            <p class="mt-1 text-sm text-charcoal/50">Church news and updates.</p>
        </div>
        <a href="{{ route('announcements.create') }}" class="btn-gold">Post Announcement</a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-brand border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    <form method="GET" action="{{ route('announcements.index') }}" class="mb-6 flex flex-wrap items-end gap-3 rounded-brand-lg border border-burgundy/10 bg-ivory p-4 shadow-brand-sm">
        <div class="min-w-[200px] flex-1">
            <label for="search" class="mb-1 block text-xs font-medium text-charcoal/60">Search title</label>
            <input type="text" id="search" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Search…" class="w-full rounded-brand border border-burgundy/15 bg-white px-3 py-2 text-sm">
        </div>

        <div>
            <label for="status" class="mb-1 block text-xs font-medium text-charcoal/60">Status</label>
            <select id="status" name="status" class="rounded-brand border border-burgundy/15 bg-white px-3 py-2 text-sm">
                <option value="">All</option>
                <option value="draft" {{ ($filters['status'] ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ ($filters['status'] ?? '') === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="btn-outline-burgundy">Filter</button>
            <a href="{{ route('announcements.index') }}" class="text-sm font-medium text-charcoal/50 hover:text-burgundy">Reset</a>
        </div>
    </form>

    <div class="overflow-x-auto rounded-brand-lg border border-burgundy/10 bg-ivory shadow-brand-sm">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-burgundy/10 bg-cream/60 text-xs font-semibold uppercase tracking-wide text-charcoal/50">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Excerpt</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Published</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-burgundy/5">
                @forelse ($announcements as $announcement)
                    <tr>
                        <td class="px-4 py-3 font-medium text-charcoal">{{ $announcement->title }}</td>
                        <td class="px-4 py-3 max-w-xs truncate text-charcoal/70">{{ $announcement->excerpt ?? '—' }}</td>
                        <td class="px-4 py-3"><x-dashboard.status-badge :status="$announcement->status" /></td>
                        <td class="px-4 py-3 text-charcoal/50">{{ $announcement->published_at?->format('M j, Y') ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('announcements.edit', $announcement) }}" class="text-sm font-medium text-burgundy hover:text-gold-dark">Edit</a>

                                <form method="POST" action="{{ route('announcements.toggle-status', $announcement) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-sm font-medium text-burgundy hover:text-gold-dark">
                                        {{ $announcement->status === 'published' ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>

                                <x-dashboard.confirm-delete
                                    :action="route('announcements.destroy', $announcement)"
                                    :confirm-text="'Delete \''.$announcement->title.'\'? This also removes its uploaded image and cannot be undone.'"
                                />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-10 text-center text-sm text-charcoal/50">
                            No announcements found. Try adjusting your filters, or post the first one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $announcements->links() }}
    </div>
@endsection