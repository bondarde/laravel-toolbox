<label class="block cursor-pointer">
    <input
        {{ $attributes }}
        type="checkbox"
        class="form-boolean"
        name="{{ $name }}"
        {!! $checked !!}>
    <span class="align-middle select-none">{{ $slot ?? $label }}</span>
</label>
