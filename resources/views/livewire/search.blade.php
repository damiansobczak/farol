<div class="inline relative">
    <div class="flex items-center w-full sm:w-80 mt-3 md:mt-0">
        <input type="text" name="" placeholder="Wyszukaj..." wire:model="input" wire:keydown.debounce.500ms="search"
            id=""
            class="outline-none appearance-none focus:ring-4 focus:ring-green-100 focus:border-green-600 p-3 rounded-full border border-solid text-gray-400 border-gray-100 w-full h-10 font-light text-sm hover:border-green-200">
    </div>

    @if ($products)
    <div
        class="absolute top-full transform translate-y-2 border shadow-sm bg-white p-2 w-full rounded-lg z-50 space-y-4">
        @foreach ($products as $product)
        <div class="flex items-center">
            <img src="{{ $product->getImgAttribute() }}" alt="" class="w-8 h-8 mr-2 rounded-full object-cover">
            <p class="text-sm text-gray-500 ">{{ $product->name }}</p>
        </div>
        @endforeach

        @if ($products->count() == 0)
        <p class="text-sm text-gray-500 my-2 px-2">Nie udało się znaleźć wyszukiwanych produktów</p>
        @endif

        <div class="bg-gray-100 px-4 py-2 text-sm text-gray-500 rounded-md mt-2">
            Wyniki wyszukiwań: {{ $products->count() }}
        </div>
    </div>
    @endif

    <div class="absolute top-full transform translate-y-2 border shadow-sm bg-white p-2 w-full rounded-lg z-10 hidden"
        wire:loading.class.remove="hidden">
        Wyszukiwanie...
    </div>

</div>