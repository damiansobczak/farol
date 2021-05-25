<div class="max-w-fluid mx-auto bg-gray-100 py-6 rounded">
    <div class="container mx-auto flex items-center">
        <a href="{{ route('main') }}" class="flex items-center text-gray-800 font-semibold text-sm hover:underline">
            Strona Główna
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="mx-2 w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        <a href={{ $link ?? '#'}} class="flex items-center text-gray-500 text-sm">
            {{ $crumb ?? ''}}
        </a>
    </div>
</div>