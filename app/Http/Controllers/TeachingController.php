<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachingRequest;
use App\Http\Requests\UpdateTeachingRequest;
use App\Models\Teaching;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TeachingController extends Controller
{
    public function index(Request $request): View
    {
        $teachings = Teaching::query()
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->string('search').'%'))
            ->when($request->filled('type'), fn ($q) => $q->where('type', $request->string('type')))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->orderByDesc('teaching_date')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('teachings.index', [
            'teachings' => $teachings,
            'filters' => $request->only(['search', 'type', 'status']),
        ]);
    }

    public function create(Request $request): View
    {
        return view('teachings.create', [
            'defaultType' => $request->query('type', 'sermon'),
        ]);
    }

    public function store(StoreTeachingRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['audio', 'thumbnail']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title']);
        $data = $this->applyStatusTransition($data, null);
        $data['created_by'] = $request->user()->id;

        if ($request->hasFile('audio')) {
            $data['audio_path'] = $request->file('audio')->store('audio', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Teaching::create($data);

        return redirect()
            ->route('teachings.index', ['type' => $data['type']])
            ->with('status', 'Teaching created.');
    }

    public function edit(Teaching $teaching): View
    {
        return view('teachings.edit', ['teaching' => $teaching]);
    }

    public function update(UpdateTeachingRequest $request, Teaching $teaching): RedirectResponse
    {
        $data = $request->safe()->except(['audio', 'thumbnail']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title'], $teaching->id);
        $data = $this->applyStatusTransition($data, $teaching);

        if ($request->hasFile('audio')) {
            $newAudioPath = $request->file('audio')->store('audio', 'public');
            if ($teaching->audio_path) {
                Storage::disk('public')->delete($teaching->audio_path);
            }
            $data['audio_path'] = $newAudioPath;
        }

        if ($request->hasFile('thumbnail')) {
            $newThumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            if ($teaching->thumbnail_path) {
                Storage::disk('public')->delete($teaching->thumbnail_path);
            }
            $data['thumbnail_path'] = $newThumbnailPath;
        }

        $teaching->update($data);

        return redirect()
            ->route('teachings.index', ['type' => $teaching->type])
            ->with('status', 'Teaching updated.');
    }

    public function destroy(Teaching $teaching): RedirectResponse
    {
        if ($teaching->audio_path) {
            Storage::disk('public')->delete($teaching->audio_path);
        }

        if ($teaching->thumbnail_path) {
            Storage::disk('public')->delete($teaching->thumbnail_path);
        }

        $type = $teaching->type;
        $teaching->delete();

        return redirect()
            ->route('teachings.index', ['type' => $type])
            ->with('status', 'Teaching deleted.');
    }

    public function toggleStatus(Teaching $teaching): RedirectResponse
    {
        if ($teaching->status === 'published') {
            $teaching->status = 'draft';
            $teaching->published_at = null;
        } else {
            $teaching->status = 'published';
            $teaching->published_at = $teaching->published_at ?? now();
        }

        $teaching->save();

        return back()->with('status', 'Teaching status updated.');
    }

    /**
     * Apply draft/published + published_at transition rules to the data array.
     */
    private function applyStatusTransition(array $data, ?Teaching $existing): array
    {
        if ($data['status'] === 'published') {
            $data['published_at'] = $existing?->published_at ?? now();
        } else {
            $data['published_at'] = null;
        }

        return $data;
    }

    /**
     * Generate a unique slug, appending -2, -3, ... on collision.
     * Ignores the given teaching ID (for updates).
     */
    private function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        $slug = $base;
        $suffix = 2;

        while (
            Teaching::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}