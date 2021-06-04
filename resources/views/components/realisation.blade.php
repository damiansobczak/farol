<div class="container mx-auto mb-16">
    <div class="flex flex-wrap items-center">
        <div class="flex flex-col my-12 md:w-5/12">
            <img src="{{ $realisation->photo }}" alt="" class="object-cover w-full h-120">
            @if ($realisation->video)
            <a class="flex items-center justify-center p-6 mt-2 text-center bg-gray-100 rounded hover:bg-gray-200 glightbox3"
                data-gallery="gallery2" href="{{ $realisation->movie }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                        clip-rule="evenodd" />
                    <p class="pl-2 font-semibold text-gray-800">Zobacz video z realizacji!</p>
                </svg></a>
            @endif
        </div>
        <div class="w-full md:w-7/12 md:p-24">
            <span class="text-xs italic text-gray-400">Dodano: {{ $realisation->created_at->diffForHumans() }}</span>
            <h1 class="mt-2 mb-4 text-3xl font-semibold font-display text-primary">{{ $realisation->title }}</h1>
            <p class="text-sm leading-7 text-secondary">{{ $realisation->description }}</p>
        </div>
    </div>
    <div class="flex flex-col mb-8">
        <div class="h-1 mb-6 bg-green-500 rounded w-52"></div>
        <h3 class="text-2xl font-semibold text-primary font-display">Galeria realizacji</h3>
    </div>
    @if (isset($realisation->galleryPhotos))
    <div class="splide" id="#splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($realisation->galleryPhotos as $photo)
                <a class="splide__slide glightbox3" data-gallery="gallery1" href="{{ $photo }}"><img src="{{ $photo }}"
                        alt="" class="object-cover w-full h-64 transition-opacity cursor-pointer hover:opacity-75"></a>
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <div class="container p-12 mx-auto text-center bg-gray-100 rounded">
        <h3 class="text-lg font-semibold text-primary">Ups...</h3>
        <p class="text-secondary">Aktualnie nie posiadamy galerii z tej realizacji</p>
    </div>
    @endif
</div>