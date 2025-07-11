@props([
    'method' => 'GET'
])

<form {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }} method="{{ $method !== 'GET' ? 'POST' : 'GET' }}" enctype="multipart/form-data">
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
