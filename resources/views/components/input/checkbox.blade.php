@props([
    'name' => null,
    'id' => null,
    'value' => null,
    'checked' => false,
])

<input type="checkbox"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    {{ $attributes->merge(['class' => 'checkbox']) }}
    @if(isset($checked) && $checked) checked @endif
/>
