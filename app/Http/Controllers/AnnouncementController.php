<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(Request $request): View
    {
        $announcements = Announcement::query()
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->string('search').'%'))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('announcements.index', [
            'announcements' => $announcements,
            'filters' => $request->only(['search', 'status']),
        ]);
    }

    public function create(): View
    {
        return view('announcements.create');
    }

    public function store(StoreAnnouncementRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['image']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title']);
        $data = $this->applyStatusTransition($data, null);
        $data['created_by'] = $request->user()->id;

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('announcements', 'public');
        }

        Announcement::create($data);

        return redirect()
            ->route('announcements.index')
            ->with('status', 'Announcement created.');
    }

    public function edit(Announcement $announcement): View
    {
        return view('announcements.edit', ['announcement' => $announcement]);
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement): RedirectResponse
    {
        $data = $request->safe()->except(['image']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title'], $announcement->id);
        $data = $this->applyStatusTransition($data, $announcement);

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('announcements', 'public');
            if ($announcement->image_path) {
                Storage::disk('public')->delete($announcement->image_path);
            }
            $data['image_path'] = $newImagePath;
        }

        $announcement->update($data);

        return redirect()
            ->route('announcements.index')
            ->with('status', 'Announcement updated.');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        if ($announcement->image_path) {
            Storage::disk('public')->delete($announcement->image_path);
        }

        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->with('status', 'Announcement deleted.');
    }

    public function toggleStatus(Announcement $announcement): RedirectResponse
    {
        if ($announcement->status === 'published') {
            $announcement->status = 'draft';
            $announcement->published_at = null;
        } else {
            $announcement->status = 'published';
            $announcement->published_at = $announcement->published_at ?? now();
        }

        $announcement->save();

        return back()->with('status', 'Announcement status updated.');
    }

    private function applyStatusTransition(array $data, ?Announcement $existing): array
    {
        if ($data['status'] === 'published') {
            $data['published_at'] = $existing?->published_at ?? now();
        } else {
            $data['published_at'] = null;
        }

        return $data;
    }

    private function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        $slug = $base;
        $suffix = 2;

        while (
            Announcement::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}