@props([
    'method' => 'GET'
])

<form {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }} method="{{ $method }}" enctype="multipart/form-data">
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
