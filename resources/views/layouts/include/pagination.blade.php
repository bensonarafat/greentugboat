@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">

        @if ($paginator->onFirstPage())
        <li class="page-item page-item--prev disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          </li>
        @else
        <li class="page-item page-item--prev disabled">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          </li>
        @endif
        <div class="paginationBlock__number">
            <ul>
        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="page-item"><a href="#" class="page-link">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active m-1"><a style="color:white;" href="#" class="page-link">{{ $page }}</a></li>
                    @else
                        <li class="page-item m-1"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    </ul>
</div>

        @if ($paginator->hasMorePages())
            <li class="page-item page-item--next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                <i class="fa-solid fa-angle-right"></i>
                </a>
            </li>
        @else
        <li class="page-item page-item--next">
            <a class="page-link" href="#">
            <i class="fa-solid fa-angle-right"></i>
            </a>
        </li>
        @endif
    </ul>
@endif
