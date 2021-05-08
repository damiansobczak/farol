<div class="container mx-auto flex items-stretch mb-16">
    <img class="object-cover w-full md:w-1/2" src=" {{ asset('img/slider-1.png') }}" alt="">
    <div class="w-full md:w-1/2 p-8 bg-gray-50 flex justify-center flex-col items-start">
        <h3 class="leading-normal font-display font-semibold text-3xl text-primary">Want to join our company?</h3>
        <p class="leading-7 text-secondary my-8">Sed enim metus, tempus elementum dui in, fringilla sollicitudin erat.
            Suspendisse blandit, nisl ut aliquet
            varius, sem dolor auctor nisi, vel facilisis sapien elit et magna. Maecenas eu nisl eleifend, iaculis nibh
            in, interdum nulla. </p>
        <a href="{{ route('products') }}"
            class="rounded-full inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white text-sm hover:bg-green-600 transition-colors">Przeglądaj
            produkty <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="ml-2 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg></a>
    </div>
</div>