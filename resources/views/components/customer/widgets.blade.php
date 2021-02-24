<div class="container max-w-screen-md mx-auto py-12">
    <div class="flex items-stretch">
        <a href="{{ route('customer.dashboard') }}"
            class="{{ request()->routeIs('customer.dashboard') ? 'border-2 border-green-600' : 'border border-gray-200 ' }} flex flex-col md:flex-row md:text-left text-center justify-center items-center flex-1 px-2 py-4 md:py-8 md:px-10 cursor-pointer hover:bg-gray-50 md:rounded-l-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="text-green-600 w-8 h-8 md:w-10 md:h-10">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <div class="mt-2 md:ml-6 md:mt-0">
                <span class="text-gray-500 text-sm">Profil Klienta</span>
                <p class="text-md md:text-lg font-semibold">Damian Sobczak</p>
            </div>
        </a>
        <a href="{{ route('customer.orders') }}"
            class="{{ request()->routeIs('customer.orders') ? 'border-2 border-green-600' : 'border border-gray-200 ' }} flex flex-col text-center md:flex-row md:text-left justify-center items-center flex-1 px-2 py-4 md:py-8 md:px-10 cursor-pointer hover:bg-gray-50 md:rounded-r-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="text-green-600 w-8 h-8 md:w-10 md:h-10">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <div class="mt-2 md:ml-6 md:mt-0">
                <span class="text-md md:text-gray-500 text-sm">Zamówienia</span>
                <p class="text-lg font-semibold">5</p>
            </div>
        </a>
    </div>
</div>