@if ($paginator->hasPages())
    <small class="d-block text-right mt-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="disabled">Newer</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="no-underline" rel="prev">Newer</a></li>
        @endif

        <span class="text-muted">|</span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="no-underline" rel="next">Older</a></li>
        @else
            <a href="#" class="disabled" aria-disabled="true"><span>Older</span></a>
        @endif
    </small>
@endif