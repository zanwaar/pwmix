@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="w-fullwidth">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="rounded-3 p-2 m-2 w-6">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
               class="rounded-3 p-2 m-2 w-6">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               class="rounded-3 p-2 m-2 w-6">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="rounded-3 p-2 m-2 w-6">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
