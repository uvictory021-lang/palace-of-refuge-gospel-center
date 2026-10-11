<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(Request $request): View
    {
        $programs = Program::query()
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->string('search').'%'))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->orderByDesc('event_date')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('programs.index', [
            'programs' => $programs,
            'filters' => $request->only(['search', 'status']),
        ]);
    }

    public function create(): View
    {
        return view('programs.create');
    }

    public function store(StoreProgramRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['flyer']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title']);
        $data['created_by'] = $request->user()->id;

        if ($request->hasFile('flyer')) {
            $data['flyer_path'] = $request->file('flyer')->store('flyers', 'public');
        }

        Program::create($data);

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program created.');
    }

    public function edit(Program $program): View
    {
        return view('programs.edit', ['program' => $program]);
    }

    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        $data = $request->safe()->except(['flyer']);

        $data['slug'] = $this->uniqueSlug($data['slug'] ?: $data['title'], $program->id);

        if ($request->hasFile('flyer')) {
            $newFlyerPath = $request->file('flyer')->store('flyers', 'public');
            if ($program->flyer_path) {
                Storage::disk('public')->delete($program->flyer_path);
            }
            $data['flyer_path'] = $newFlyerPath;
        }

        $program->update($data);

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program updated.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        if ($program->flyer_path) {
            Storage::disk('public')->delete($program->flyer_path);
        }

        $program->delete();

        return redirect()
            ->route('programs.index')
            ->with('status', 'Program deleted.');
    }

    /**
     * Generate a unique slug, appending -2, -3, ... on collision.
     * Ignores the given program ID (for updates).
     */
    private function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        $slug = $base;
        $suffix = 2;

        while (
            Program::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}