@props([
    'method' => 'GET'
])

@php
    $defaultClasses = 'flex flex-col gap-4';
    // If flex-row is specified, don't add flex-col
    if (str_contains($attributes->get('class', ''), 'flex-row')) {
        $defaultClasses = 'flex gap-4';
    }
@endphp

<form {{ $attributes->merge(['class' => $defaultClasses]) }} method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" enctype="multipart/form-data">
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
