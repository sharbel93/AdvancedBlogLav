
@if ($paginator->hasPages())
    <div class="pagination-wrapper m-t-20">
        <nav class="pagination is-centered is-rounded"  role="navigation" aria-label="pagination">


            <ul class="pagination-list" >
                {{--Previous Page Link--}}
                @if ($paginator->onFirstPage())
                    <a class="pagination-prev" disabled>&lsaquo;
                        {{--<li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
                        {{--<span aria-hidden="true">&lsaquo;</span>--}}
                        {{--</li>--}}
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" >&lsaquo;
                            </a>
                            {{--<li>--}}
                            {{--<a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
                            {{--</li>--}}
                        @endif
                {{--Pagination Elements--}}
                @foreach ($elements as $element)
                    {{--"Three Dots" Separator--}}
                    @if (is_string($element))
                        <li ><span class="pagination-ellipsis">&hellip;</span></li>
                        {{--<li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
                    @endif

                    {{--Array Of Links--}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <a class="pagination-link is-current" >
                                        {{ $page }}
                                    </a>
                                </li>
                                {{--<li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                            @else
                                <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{--Next Page Link--}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>

        </nav>

    </div>
@endif

{{--@if ($paginator->hasPages())--}}
    {{--<ul class="pagination" role="navigation">--}}
        {{-- Previous Page Link --}}
        {{--@if ($paginator->onFirstPage())--}}
            {{--<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
                {{--<span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li class="page-item">--}}
                {{--<a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
            {{--</li>--}}
        {{--@endif--}}

        {{-- Pagination Elements --}}
        {{--@foreach ($elements as $element)--}}
            {{-- "Three Dots" Separator --}}
            {{--@if (is_string($element))--}}
                {{--<li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
            {{--@endif--}}

            {{-- Array Of Links --}}
            {{--@if (is_array($element))--}}
                {{--@foreach ($element as $page => $url)--}}
                    {{--@if ($page == $paginator->currentPage())--}}
                        {{--<li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
                    {{--@else--}}
                        {{--<li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endif--}}
        {{--@endforeach--}}

        {{-- Next Page Link --}}
        {{--@if ($paginator->hasMorePages())--}}
            {{--<li class="page-item">--}}
                {{--<a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
            {{--</li>--}}
        {{--@else--}}
            {{--<li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
                {{--<span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
            {{--</li>--}}
        {{--@endif--}}
    {{--</ul>--}}
{{--@endif--}}
