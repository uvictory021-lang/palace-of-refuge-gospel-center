@props(['action', 'label' => 'Delete', 'confirmText' => 'Delete this item? This cannot be undone.'])

<form method="POST" action="{{ $action }}" onsubmit="return confirm('{{ $confirmText }}')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-sm font-medium text-burgundy transition-colors duration-[220ms] ease-brand hover:text-burgundy-dark">
        {{ $label }}
    </button>
</form>