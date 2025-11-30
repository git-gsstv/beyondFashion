@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-beige-900']) }}>
    {{ $value ?? $slot }}
</label>