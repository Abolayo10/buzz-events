@if ($paginator->hasPages())
<nav class="flex items-center justify-center space-x-1">

    {{-- Page précédente --}}
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600 hover:bg-purple-50 hover:border-purple-400 transition text-sm">
            <i class="fas fa-chevron-left mr-1"></i> Précédent
        </a>
    @else
        <span class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed text-sm">
            <i class="fas fa-chevron-left mr-1"></i> Précédent
        </span>
    @endif

    {{-- Numéros de page --}}
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        @if ($page === $paginator->currentPage())
            <span class="px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold text-sm">{{ $page }}</span>
        @else
            <a href="{{ $url }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600 hover:bg-purple-50 hover:border-purple-400 transition text-sm">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Page suivante --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-600 hover:bg-purple-50 hover:border-purple-400 transition text-sm">
            Suivant <i class="fas fa-chevron-right ml-1"></i>
        </a>
    @else
        <span class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed text-sm">
            Suivant <i class="fas fa-chevron-right ml-1"></i>
        </span>
    @endif

</nav>
@endif