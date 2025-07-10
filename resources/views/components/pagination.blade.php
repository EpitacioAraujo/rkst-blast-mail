@props([
    'pages' => 1,
    'currentPage' => 0,
    'getUrl' => fn () => ''
])

@php
    $page = request()->query('page', 1);
    $prevPage = $page - 1;
    $nextPage = $page + 1;
@endphp

<div {{ $attributes->class(['join']) }}>
    @if($pages > 1 && $currentPage > 1)
        <a href="{{ $getUrl($currentPage - 1) }}" class="join-item btn">«</a>
    @endif

    @for($i = 1; $i <= $pages; $i++)
        <a
            href="{{ $getUrl($i) }}"
            @class([
                'join-item btn',
                'btn-active' => $i == $currentPage,
            ])
        > {{ $i }} </a>
    @endfor

    @if($pages > 1 && $currentPage < $pages)
        <a href="{{ $getUrl($currentPage + 1) }}" class="join-item btn">»</a>
    @endif
</div>
