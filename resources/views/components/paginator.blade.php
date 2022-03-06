@if ($paginator->hasPages())
    <div class="col-md-12">
        <div class="pagination">
            <ul>
            {{-- <div class="pagination-items" aria-label="{{ __('Pagination Navigation') }}"> --}}
                @if ($paginator->onFirstPage())
                    <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                @endif

                @foreach ($paginator->links()->elements[0] as $page => $routeItem)
                    @if ($page == $paginator->currentPage())
                        <li><a href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                    <li><a href="{{ $routeItem}}">{{ $page }}</a></li>
                    {{-- <a href="{{ $routeItem}}" class="pagination-item">{{ $page }}</a> --}}
                    @endif
                    
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                @else
                    <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
@endif
