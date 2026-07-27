@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="tw-pagination">
        <div class="tw-pagination-mobile">
            @if ($paginator->onFirstPage())
                <span class="tw-page-btn tw-disabled">{!! __('pagination.previous') !!}</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="tw-page-btn" wire:navigate>{!! __('pagination.previous') !!}</a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="tw-page-btn" wire:navigate>{!! __('pagination.next') !!}</a>
            @else
                <span class="tw-page-btn tw-disabled">{!! __('pagination.next') !!}</span>
            @endif
        </div>

        <div class="tw-pagination-desktop">
            <p class="tw-pagination-info">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="fw-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="fw-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>

            <span class="tw-page-group">
                @if ($paginator->onFirstPage())
                    <span class="tw-page-btn tw-page-icon tw-disabled tw-rounded-l" aria-disabled="true">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="tw-page-btn tw-page-icon tw-rounded-l" wire:navigate aria-label="{{ __('pagination.previous') }}">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="tw-page-btn tw-disabled">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="tw-page-btn tw-active" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="tw-page-btn" wire:navigate>{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="tw-page-btn tw-page-icon tw-rounded-r" wire:navigate aria-label="{{ __('pagination.next') }}">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @else
                    <span class="tw-page-btn tw-page-icon tw-disabled tw-rounded-r" aria-disabled="true">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @endif
            </span>
        </div>
    </nav>
@endif
