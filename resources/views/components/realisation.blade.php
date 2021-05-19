<div class="container mx-auto mb-16">
    <div class="flex items-center flex-wrap">
        <img src="{{ $realisation->photo }}" alt="" class="object-cover h-120 my-12 w-full md:w-5/12">
        <div class="w-full md:w-7/12 md:p-24">
            <span class="text-xs text-gray-400 italic">Dodano: {{ $realisation->created_at->diffForHumans() }}</span>
            <h1 class="font-display text-3xl font-semibold mb-4 text-primary mt-2">{{ $realisation->title }}</h1>
            <p class="text-secondary text-sm leading-7">{{ $realisation->description }}</p>
        </div>
    </div>
    <div class="flex flex-col mb-8">
        <div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
        <h3 class="text-primary font-semibold font-display text-2xl">Galeria realizacji</h3>
    </div>
    @if (isset($realisation->galleryPhotos))
    <div class="splide" id="#splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($realisation->galleryPhotos as $photo)
                <a class="splide__slide glightbox3" data-gallery="gallery1" href="{{ $photo }}"><img src="{{ $photo }}"
                        alt="" class="w-full h-64 object-cover cursor-pointer hover:opacity-75 transition-opacity"></a>
                @endforeach
            </ul>
        </div>
    </div>
    @else
    <div class="container mx-auto rounded text-center bg-gray-100 p-12">
        <h3 class="text-lg font-semibold text-primary">Ups...</h3>
        <p class="text-secondary">Aktualnie nie posiadamy galerii z tej realizacji</p>
    </div>
    @endif

    {{-- <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5" id="#splide">
    </div> --}}
</div>