@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Products Pagination" class="flex gap-[20px] justify-center mt-6 space-x-1" style="font-family: MTNBrighterSans-Regular">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">&laquo;</a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-1 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">&raquo;</a>
        @else
            <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded">&raquo;</span>
        @endif

    </nav>
@endif
