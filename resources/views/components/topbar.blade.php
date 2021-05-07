<div class="border-b border-solid border-gray-100 py-5">
    <div class="container mx-auto flex items-center justify-center flex-wrap sm:justify-between">
        <a href="{{ route('main') }}" class="w-auto xl:w-96">
            <img src="{{ asset('logo.png') }}" alt="Logo sklepu internetowego" class="w-40">
        </a>
        @livewire('search')
        <p class="font-light text-secondary text-sm text-center w-full lg:text-right lg:w-96 mt-4 lg:mt-0 font-display">
            Potrzebujesz
            pomocy
            specjalisty? <b class="text-primary font-semibold">(48) 516
                158 094</b></p>
    </div>
</div>