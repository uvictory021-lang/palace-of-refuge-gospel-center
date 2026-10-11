@php
    $announcement ??= null;
@endphp

<x-dashboard.form-field label="Title" name="title" required>
    <input
        type="text" id="title" name="title"
        value="{{ old('title', $announcement->title ?? '') }}"
        required
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal focus:border-gold focus:outline-none"
    >
</x-dashboard.form-field>

<x-dashboard.form-field label="Slug" name="slug" hint="Leave blank to auto-generate from the title.">
    <input
        type="text" id="slug" name="slug"
        value="{{ old('slug', $announcement->slug ?? '') }}"
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal focus:border-gold focus:outline-none"
    >
</x-dashboard.form-field>

<x-dashboard.form-field label="Excerpt" name="excerpt" hint="A short one- or two-line summary shown in previews.">
    <input
        type="text" id="excerpt" name="excerpt"
        value="{{ old('excerpt', $announcement->excerpt ?? '') }}"
        maxlength="255"
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal focus:border-gold focus:outline-none"
    >
</x-dashboard.form-field>

<x-dashboard.form-field label="Content" name="content">
    <textarea
        id="content" name="content" rows="6"
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal focus:border-gold focus:outline-none"
    >{{ old('content', $announcement->content ?? '') }}</textarea>
</x-dashboard.form-field>

<x-dashboard.form-field label="Image" name="image" :hint="isset($announcement) && $announcement->image_path ? 'An image is already uploaded. Choose a new one to replace it.' : 'JPG or PNG. Max 4MB.'">
    <input
        type="file" id="image" name="image" accept="image/*"
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal file:mr-3 file:rounded-brand-sm file:border-0 file:bg-gold/15 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-burgundy-dark"
    >
</x-dashboard.form-field>

<x-dashboard.form-field label="Status" name="status" required>
    <select
        id="status" name="status"
        class="w-full rounded-brand border border-burgundy/15 bg-ivory px-3.5 py-2.5 text-sm text-charcoal focus:border-gold focus:outline-none"
    >
        <option value="draft" {{ old('status', $announcement->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $announcement->status ?? 'draft') === 'published' ? 'selected' : '' }}>Published</option>
    </select>
</x-dashboard.form-field>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="btn-gold">
        {{ isset($announcement) ? 'Save Changes' : 'Create Announcement' }}
    </button>
    <a href="{{ route('announcements.index') }}" class="text-sm font-medium text-charcoal/60 hover:text-burgundy">
        Cancel
    </a>
</div>