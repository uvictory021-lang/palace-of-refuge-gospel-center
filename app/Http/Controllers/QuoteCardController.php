<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteCardRequest;
use App\Http\Requests\UpdateQuoteCardRequest;
use App\Models\QuoteCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class QuoteCardController extends Controller
{
    public function index(Request $request): View
    {
        $quoteCards = QuoteCard::query()
            ->when($request->filled('search'), fn ($q) => $q->where('quote', 'like', '%'.$request->string('search').'%'))
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('is_published', $request->string('status') === 'published');
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('quote-cards.index', [
            'quoteCards' => $quoteCards,
            'filters' => $request->only(['search', 'status']),
        ]);
    }

    public function create(): View
    {
        return view('quote-cards.create');
    }

    public function store(StoreQuoteCardRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['background_image']);
        $data['is_published'] = $request->boolean('is_published');
        $data['created_by'] = $request->user()->id;

        if ($data['background_type'] === 'image' && $request->hasFile('background_image')) {
            $data['background_value'] = $request->file('background_image')->store('quote-cards', 'public');
        }

        QuoteCard::create($data);

        return redirect()
            ->route('quote-cards.index')
            ->with('status', 'Quote card created.');
    }

    public function edit(QuoteCard $quoteCard): View
    {
        return view('quote-cards.edit', ['quoteCard' => $quoteCard]);
    }

    public function update(UpdateQuoteCardRequest $request, QuoteCard $quoteCard): RedirectResponse
    {
        $data = $request->safe()->except(['background_image']);
        $data['is_published'] = $request->boolean('is_published');

        $wasImage = $quoteCard->background_type === 'image';

        if ($data['background_type'] === 'image' && $request->hasFile('background_image')) {
            $newPath = $request->file('background_image')->store('quote-cards', 'public');
            if ($wasImage && $quoteCard->background_value) {
                Storage::disk('public')->delete($quoteCard->background_value);
            }
            $data['background_value'] = $newPath;
        } elseif ($data['background_type'] === 'color' && $wasImage && $quoteCard->background_value) {
            // switching away from an uploaded image to a color — clean up the old file
            Storage::disk('public')->delete($quoteCard->background_value);
        }

        $quoteCard->update($data);

        return redirect()
            ->route('quote-cards.index')
            ->with('status', 'Quote card updated.');
    }

    public function destroy(QuoteCard $quoteCard): RedirectResponse
    {
        if ($quoteCard->background_type === 'image' && $quoteCard->background_value) {
            Storage::disk('public')->delete($quoteCard->background_value);
        }

        $quoteCard->delete();

        return redirect()
            ->route('quote-cards.index')
            ->with('status', 'Quote card deleted.');
    }

    public function toggleStatus(QuoteCard $quoteCard): RedirectResponse
    {
        $quoteCard->is_published = ! $quoteCard->is_published;
        $quoteCard->save();

        return back()->with('status', 'Quote card status updated.');
    }
}