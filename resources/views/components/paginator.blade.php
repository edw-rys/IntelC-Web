@if ($paginator->hasPages())
    <ul class="custom-pagination list-inline text-center text-uppercase mt-4" data-animate="fadeInUp" data-delay=".1">
        {{-- <div class="pagination-items" aria-label="{{ __('Pagination Navigation') }}"> --}}
        @if ($paginator->onFirstPage())
            <li class="float-left disabled"><a href="javascript:void(0)"><i class="fas fa-caret-left"></i> Anterior</a>
            </li>
        @else
            <li class="float-left disabled"><a href="{{ $paginator->previousPageUrl() }}"><i
                        class="fas fa-caret-left"></i> Anterior</a></li>
        @endif

        @foreach ($paginator->links()->elements[0] as $page => $routeItem)
            @if ($page == $paginator->currentPage())
                <li><a href="#">{{ $page }}</a></li>
            @else
                <li><a href="{{ $routeItem }}">{{ $page }}</a></li>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="float-right"><a href="{{ $paginator->nextPageUrl() }}">Siguiente <i
                        class="fas fa-caret-right"></i></a></li>
        @else
            <li class="float-right"><a href="javascript:void(0)">Next <i class="fas fa-caret-right"></i></a></li>
        @endif
    </ul>
@endif
