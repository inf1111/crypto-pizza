@if ($paginator->hasPages())
    <nav>
        <ul class="pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{--<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>--}}
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}">
                    <svg class="icon icon-pag ">
                        <use xlink:href="/images/sprite.svg#pag"></use>
                    </svg>Предыдущая</a>
                </li>
                {{--<li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>--}}
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="is-active"><a class="pagination__pagenav" href="#">{{ $page }}</a></li>
                            {{--<li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                        @else
                            <li><a class="pagination__pagenav" href="{{ $url }}">{{ $page }}</a></li>
                            {{--<li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">Следующая
                        <svg class="icon icon-pag ">
                            <use xlink:href="/images/sprite.svg#pag"></use>
                        </svg>
                    </a>
                </li>
                {{--<li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>--}}
            @else
                {{--<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>--}}
            @endif
        </ul>
    </nav>
@endif
