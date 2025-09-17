@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Categories Pagination" class="flex flex-wrap justify-end gap-2 mt-3" style="font-family: MTNBrighterSans-Medium">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">&laquo;</a>
        @endif

        {{-- Category Links --}}
        @foreach ($paginator->items() as $category)
            @php
                $isActive = request()->fullUrlIs('*page='.$category->id.'*');
            @endphp
            <a href="{{ $category->url ?? '#' }}"
               class="px-4 py-1 rounded
                     {{ $isActive ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                {{ $category->category_name }}
            </a>
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">&raquo;</a>
        @else
            <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded">&raquo;</span>
        @endif

    </nav>
@endif
