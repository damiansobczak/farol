<div class="max-w-fluid px-3 mx-auto my-12">
    <div class="container mx-auto flex md:space-x-6 items-start">
        <ul class="bg-gray-800 rounded p-4 hidden md:block md:w-1/5">
            @foreach ($categories as $category)
            <li
                class="text-white hover:opacity-70 font-semibold uppercase text-sm border-b border-gray-700 py-5 last:border-b-0">
                <a href="#{{$category->name}}" class="flex items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                    {{ $category->name }}</a>
            </li>
            @endforeach
        </ul>

        <div class="flex-1 space-y-12">
            @foreach ($categories as $category)
            <div class="border-b border-gray-100 pb-8 last:border-b-0" id="{{$category->name}}">
                <p class="text-green-500 font-display font-semibold text-sm">Idealne do mieszkań i apartamentów</p>
                <h2 class="font-semibold text-2xl text-gray-800 font-display">{{ $category->name }}</h2>
                <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                    @foreach ($category->products as $product)
                    <div class="bg-gray-50 rounded p-5 flex h-72 justify-between">
                        <div class="w-2/5">
                            <p class="font-display font-semibold text-md">{{ $product->name }}</p>
                            <div class="border-2 border-green-500 w-16 rounded mt-2 mb-4"></div>
                            <a href="{{ route('product', $product->slug) }}"
                                class="text-gray-400 flex items-center text-xs uppercase font-semibold whitespace-nowrap">Zobacz
                                więcej <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M9 5l7 7-7 7" />
                                </svg></a>
                        </div>
                        <img src="{{ $product->getImgAttribute()}}" alt="" class="w-52 object-cover">
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>