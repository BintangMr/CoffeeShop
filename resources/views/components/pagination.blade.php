@if ($paginator->onFirstPage())
    <span class="pager_prev isDisabled"></span>
@else
    <a href="{{ $paginator->previousPageUrl() }}"  class="pager_prev isDisabled"></a>
@endif



@foreach ($elements as $element)

    @if (is_string($element))
        <span class="">{{ $element }}</span>
    @endif



    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="pager_current active ">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="">{{ $page }}</a>
            @endif
        @endforeach
    @endif
@endforeach



@if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="pager_next"></a>
@else
    <span class="pager_next isDisabled"></span>
@endif
