
@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            @php
                $currentPageURL = url()->current();
                $pagesCount = $paginator->total() / $paginator->perPage();

                if (is_float($pagesCount)) {
                    $pagesCount = (int) ($pagesCount + 1);
                }

                // if given pagination links count more than the count of possible pages
                $paginationLinksLimit = $paginationLinksLimit > $pagesCount ? $pagesCount : $paginationLinksLimit;

                $currentPageNumber = $paginator->currentPage();
                $bothSidesLinksCount =  (int) ($paginationLinksLimit / 2 );

                if ($currentPageNumber > 1 && $currentPageNumber > $bothSidesLinksCount) {
                    $i = $currentPageNumber - $bothSidesLinksCount;
                    $limit = $currentPageNumber + $bothSidesLinksCount;

                    if ($limit > $pagesCount) {
                        $limit = $pagesCount;
                        $i = ($limit - $paginationLinksLimit) + 1;
                    }

                } else {
                    $i = 1;
                    $limit = $paginationLinksLimit;
                }
            @endphp

            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>

            @for ($i; $i <= $limit; $i ++)
                @if ($i === $currentPageNumber)
                    <li class="page-item active"><a class="page-link" href="{{ $currentPageURL . '?page=' . $i }}">{{ $i }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $currentPageURL . '?page=' . $i }}">{{ $i }}</a></li>
                @endif
            @endfor

            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>
@endif

