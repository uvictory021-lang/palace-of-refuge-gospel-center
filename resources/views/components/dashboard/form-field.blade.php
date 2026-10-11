@props(['label', 'name', 'required' => false, 'hint' => null])

<div class="mb-5">
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-charcoal">
        {{ $label }}
        @if ($required)
            <span class="text-burgundy">*</span>
        @else
            <span class="font-normal text-charcoal/40">(optional)</span>
        @endif
    </label>

    {{ $slot }}

    @if ($hint)
        <p class="mt-1 text-xs text-charcoal/50">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-xs text-burgundy">{{ $message }}</p>
    @enderror
</div>