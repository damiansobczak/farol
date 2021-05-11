<div class="container mx-auto mb-16">
    <div class="flex items-center flex-wrap">
        <img src="{{ asset('img/slider-1.png')}}" alt="" class="object-cover h-120 my-12 w-full md:w-5/12">
        <div class="w-full md:w-7/12 md:p-24">
            <span class="text-xs text-gray-400 italic">Dodano: Miesiąc temu</span>
            <h1 class="font-display text-3xl font-semibold mb-4 text-primary mt-2">Najnowsza realizacja naszej firmy.
            </h1>
            <p class="text-secondary text-sm leading-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed et
                facilisis
                tortor,
                eu tempor
                diam. Nam metus nulla, dictum non enim aliquet, finibus mollis mauris. Aliquam vel nisi nibh. Sed cursus
                ex
                at
                mauris pellentesque, quis rhoncus velit condimentum. Fusce vitae aliquet nibh, ut consectetur ligula.
                Duis
                consequat faucibus sem. Nulla fringilla non dui et consequat. </p>
        </div>
    </div>
    <div class="flex flex-col mb-8">
        <div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
        <h3 class="text-primary font-semibold font-display text-2xl">Galeria realizacji</h3>
    </div>
    <div class="splide" id="#splide">
        <div class="splide__track">
            <ul class="splide__list">
                <a class="splide__slide glightbox3" data-gallery="gallery1" href="{{ asset('img/slider-2.png')}}"><img
                        src="{{ asset('img/slider-2.png')}}" alt=""
                        class="w-full h-64 object-cover cursor-pointer hover:opacity-75 transition-opacity"></a>
                <a class="splide__slide glightbox3" data-gallery="gallery1" href="{{ asset('img/slider-2.png')}}"><img
                        src="{{ asset('img/slider-2.png')}}" alt=""
                        class="w-full h-64 object-cover cursor-pointer hover:opacity-75 transition-opacity"></a>
                <a class="splide__slide glightbox3" data-gallery="gallery1" href="{{ asset('img/slider-2.png')}}"><img
                        src="{{ asset('img/slider-2.png')}}" alt=""
                        class="w-full h-64 object-cover cursor-pointer hover:opacity-75 transition-opacity"></a>
            </ul>
        </div>
    </div>

    {{-- <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5" id="#splide">
    </div> --}}
</div>