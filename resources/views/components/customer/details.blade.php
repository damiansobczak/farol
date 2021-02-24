<div class="fixed flex hidden top-0 left-0 items-center justify-center w-screen h-screen overflow-hidden bg-black bg-opacity-10 z-50"
    id="customer-order-modal">
    <div class="rounded-md py-4 w-full max-w-screen-md bg-white shadow-sm">
        <div class="py-4 px-10 flex items-center justify-between">
            <span class="text-gray-800">Szczegóły</span>
            <svg id="customer-order-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" class="w-6 h-6 text-gray-800 cursor-pointer hover:text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="p-5 bg-gray-100 border-t border-b border-gray-100 space-y-4">
            <div class="bg-white rounded-md p-5 shadow-sm flex flex-wrap items-center">
                <img src="{{ asset('produkt.png') }}"
                    class="w-16 h-16 p-2 object-cover rounded-md border border-gray-100" alt="">
                <div class="ml-6">
                    <span class="text-sm text-gray-700 font-medium">Roleta materiałowa - Roleta Uni Besta
                    </span>
                    <p class="text-gray-400 text-sm">Kolor systemu: Biały; Kolor materiału: Blue Laguna; Strona
                        sterowania: Lewa</p>
                </div>
                <div class="w-full flex items-stretch border-t border-gray-100 mt-5 pt-5">
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Numer</span>
                        <span class="text-sm font-semibold">ID 158125</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Data</span>
                        <span class="text-sm font-semibold">24-01-2021</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Ilość</span>
                        <span class="text-sm font-semibold">2</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Cena</span>
                        <span class="text-sm font-semibold">148,92zł</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-md p-5 shadow-sm flex flex-wrap items-center">
                <img src="{{ asset('produkt.png') }}"
                    class="w-16 h-16 p-2 object-cover rounded-md border border-gray-100" alt="">
                <div class="ml-6">
                    <span class="text-sm text-gray-700 font-medium">Roleta materiałowa - Roleta Uni Besta
                    </span>
                    <p class="text-gray-400 text-sm">Kolor systemu: Biały; Kolor materiału: Blue Laguna; Strona
                        sterowania: Lewa</p>
                </div>
                <div class="w-full flex items-stretch border-t border-gray-100 mt-5 pt-5">
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Numer</span>
                        <span class="text-sm font-semibold">ID 158125</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Data</span>
                        <span class="text-sm font-semibold">24-01-2021</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Ilość</span>
                        <span class="text-sm font-semibold">2</span>
                    </div>
                    <div class="w-3/12 text-sm text-gray-600 flex flex-col">
                        <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Cena</span>
                        <span class="text-sm font-semibold">148,92zł</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-10 pt-6 pb-2 flex items-center justify-between">
            <span class="text-gray-400 uppercase tracking-wide font-medium text-xs">Koszt zamówienia</span>
            <span class="text-green-600 font-medium">297,84zł</span>
        </div>
    </div>
</div>