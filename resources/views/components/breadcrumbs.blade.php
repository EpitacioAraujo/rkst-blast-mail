@props([
    'crumbs' => []
])

<div class="breadcrumbs text-sm">
    <ul>
        @foreach($crumbs as $crumb)
            <li>
                @if(isset($crumb['url']))
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                @else
                    {{ $crumb['label'] }}
                @endif
            </li>
        @endforeach
    </ul>
</div>
