<div class="flex items-strech relative h-120 w-full overflow-hidden max-w-fluid mx-auto">
    {{-- Slider --}}
    <div class="flex items-stretch flex-1 transition-all" id="slider">
        @foreach ($sliders as $slider)
        @if ($slider->onlyImage)
        <a href="{{ $slider->onlyImageLink }}"
            class="flex items-stretch flex-1 min-w-full relative bg-center bg-cover bg-no-repeat"
            style="background-image: url('{{ $slider->onlyImage }}')"></a>
        @else
        <div class="flex items-stretch flex-1 min-w-full relative">
            <div class="flex-1 w-full lg:w-1/2" style="background-color: #353535"></div>
            <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                <div class="container mx-auto">
                    <h1 class="text-white font-medium text-4xl max-w-lg font-display leading-normal">
                        {{ $slider->title }}</h1>
                    <p class="my-5 text-white leading-7 text-opacity-70 max-w-lg">
                        {{ $slider->description }}</p>
                    <a href="{{ $slider->actionLink }}"
                        class="rounded-full inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white text-sm hover:bg-green-600 transition-colors">
                        {{ $slider->actionName }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="ml-2 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg></a>
                </div>
            </div>
            <img src="{{ $slider->photo }}" class="flex-1 w-full lg:w-1/2 object-cover" />
        </div>
        @endif
        @endforeach
    </div>

    {{-- Slider Navigations --}}
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