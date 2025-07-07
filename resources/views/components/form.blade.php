@props([
    'method' => null
])

<form {{ $attributes->class(['flex', 'flex-col', 'gap-4']) }} method="POST" enctype="multipart/form-data">
    @csrf
    @method($method ?? 'GET')

    {{ $slot}}
</form>
