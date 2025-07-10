@props([
    'pages' => 1,
    'getUrl' => fn () => ''
])

@php
    $page = request()->query('page', 1);
    $prevPage = $page - 1;
    $nextPage = $page + 1;
@endphp

<div {{ $attributes->class(['join']) }}>
    @if($pages > 1)
        <a href="{{ $getUrl($i) }}" class="join-item btn">«</a>
    @endif

    @for($i = 0; $i < $pages; $i++)
        <a href="{{ $getUrl($i) }}" class="join-item btn"> {{ $i + 1 }} </a>
    @endfor

    @if($pages > 1)
        <a href="{{ $getUrl($i) }}" class="join-item btn">»</a>
    @endif
</div>
