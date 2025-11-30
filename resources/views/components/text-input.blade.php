@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    // Aumentando a cor da borda de 300 para 400, e o foco para 700 para mais contraste
    'class' => 'border-beige-400 focus:border-beige-700 focus:ring-beige-700 rounded-md shadow-sm'
]) !!}>