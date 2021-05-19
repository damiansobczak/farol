<section class="max-w-fluid px-3 mx-auto my-16">
    <div class="container mx-auto">
        <div class="flex items-end justify-between mb-5">
            <div>
                <div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
                <h3 class="font-semibold text-2xl text-primary font-display">Realizacje</h3>
            </div>
            <div class="flex items-center justify-center py-3 text-secondaryfont-display text-sm">
                Aktualnie {{ $realisations->count() }} realizacje</div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse ($realisations as $realisation)
            <div class="flex md:flex-col w-full">
                <img src="{{ $realisation->photo }}" alt=""
                    class="h-24 mr-6 md:mr-0 md:h-80 object-cover rounded-tl-3xl rounded-br-3xl w-1/5 md:w-full" />
                <div class="w-4/5 md:mt-5">
                    <h3 class="text-primary font-semibold text-lg font-display">{{ $realisation->title }}</h3>
                    <p class="text-secondary mt-2 text-sm leading-7">
                        {{ Str::limit($realisation->description, 160, '...') }}</p>
                    <a href="{{ route('realisation', $realisation->slug) }}"
                        class="flex items-center py-3 text-green-500 text-sm">Przeczytaj więcej
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="ml-2 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg></a>
                </div>
            </div>
            @empty
            <div class="container mx-auto rounded text-center bg-gray-100 p-12">
                <h3 class="text-lg font-semibold text-primary">Ups...</h3>
                <p class="text-secondary">Aktualnie nie posiadamy realizacji</p>
            </div>
            @endforelse
        </div>
    </div>
</section>