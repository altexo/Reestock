@if ($paginator->hasPages())
<nav>
    <ul class="pagination pg-red">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </span>
        @else
            <li class="page-item">
                <a class="page-link"  href="{{ $paginator->previousPageUrl() }}" aria-label="prev" rel="prev">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Prev</span>
                </a>
            </li>
        
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))

                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}<span class="sr-only">(current)</span></span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                       
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link"  href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
          
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
</nav>
@endif
