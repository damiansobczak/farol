<div class="flex items-strech relative h-120 w-full overflow-hidden max-w-fluid mx-auto">
    <div class="flex items-stretch flex-1 transition-all" id="slider">
        <div class="flex items-stretch flex-1 min-w-full relative">
            <div class="flex-1 w-full lg:w-1/2" style="background-color: #353535"></div>
            <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                <div class="container mx-auto">
                    <h1 class="text-white font-medium text-4xl max-w-lg font-display leading-10">Najciekawsze
                        rozwiązania <span class="opacity-50 font-extralight">do mieszkań i domów</span>
                    </h1>
                    <p class="my-5 text-white leading-6 text-sm max-w-lg">Każdy z oferowanych przez nas produktów
                        posiada swoiste właściwości, dzięki którym komponują się z ogólnym wystrojem wnętrz, a także w
                        delikatny sposób uzupełniają i dopełniają cały wygląd pomieszczenia.</p>
                    <button
                        class="rounded-full flex items-center justify-center px-6 py-3 bg-green-500 text-white text-sm hover:bg-green-600 transition-colors">Przeglądaj
                        produkty <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="ml-2 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg></button>
                </div>
            </div>
            <img src="{{ asset('img/slider-1.png') }}" class="flex-1 w-full lg:w-1/2 object-cover" />
        </div>
        <div class="flex items-stretch flex-1 min-w-full relative">
            <div class="flex-1 w-full lg:w-1/2" style="background-color: #353535">
                <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                    <div class="container mx-auto">
                        <h1 class="text-white font-medium text-4xl max-w-lg font-display leading-10">Specjalizujemy się
                            w
                            branży
                            <span class="opacity-50 font-extralight">osłon okiennych</span></h1>
                        <p class="my-5 text-white text-sm max-w-lg">Firma Farol powstała w 2014 roku.
                            Specjalizujemy się w branży osłon okiennych. Naszą cechą charakterystyczną jest młody,
                            zgrany zespół gotowy do podjęcia się każdego zadnia w celu zadowolenia klienta.</p>
                        <button
                            class="rounded-full flex items-center justify-center px-6 py-3 bg-green-500 text-white text-sm hover:bg-green-600 transition-colors">Przeglądaj
                            produkty <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="ml-2 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg></button>
                    </div>
                </div>
            </div>
            <img src="{{ asset('img/slider-2.png') }}" class="flex-1 w-full lg:w-1/2 object-cover" />
        </div>
    </div>
    <div class="flex items-center justify-between absolute inset-y-2/4 w-full px-4">
        <button id="slider-control-left"
            class="rounded-full px-6 py-2 text-white bg-white bg-opacity-20 hover:bg-opacity-10 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="ml-2 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg></button>
        <button id="slider-control-right"
            class="rounded-full px-6 py-2 text-white bg-white bg-opacity-20 hover:bg-opacity-10 transition-all"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="ml-2 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </button>
    </div>
</div>