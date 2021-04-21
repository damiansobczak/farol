<div class="w-full lg:w-9/12 flex flex-col lg:pl-8">
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Pomiar
		</div>
		<div class="flex flex-wrap items-center px-3 md:px-6">
			<div class="flex flex-wrap items-start mb-4 lg:mb-0">
				<p class="font-display text-gray-800 font-medium w-full mb-3">Szerokość</p>
				<div class="inline-flex flex-grow-0 w-auto relative">
					<button
						class="w-10 h-10 rounded-md flex items-center justify-center absolute top-1/2 transform -translate-y-1/2 left-1 bg-gray-100 hover:bg-gray-200">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					</button>
					<input type="text" value="500" class="border border-gray-100 rounded-md p-4 pl-16 w-80 h-12" />
					<button
						class="w-10 h-10 rounded-md flex items-center justify-center absolute top-1/2 transform -translate-y-1/2 right-1 bg-gray-100 hover:bg-gray-200">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
						</svg>
					</button>
				</div>
			</div>
			<div class="flex flex-wrap items-start">
				<p class="font-display text-gray-800 font-medium w-full mb-3">Wysokość</p>
				<div class="inline-flex flex-grow-0 w-auto relative">
					<button
						class="w-10 h-10 rounded-md flex items-center justify-center absolute top-1/2 transform -translate-y-1/2 left-1 bg-gray-100 hover:bg-gray-200">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
					</button>
					<input type="text" value="500" class="border border-gray-100 rounded-md p-4 pl-16 w-80 h-12" />
					<button
						class="w-10 h-10 rounded-md flex items-center justify-center absolute top-1/2 transform -translate-y-1/2 right-1 bg-gray-100 hover:bg-gray-200">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="w-5 h-5">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
						</svg>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Strona
			sterowania</div>
		<div class="flex items-center px-3 md:px-6">
			<div class="flex flex-wrap items-start">
				<div class="inline-flex flex-grow-0 w-auto relative">
					<button
						class="rounded-md border border-green-300 w-36 h-16 p-5 flex items-center font-display text-sm mr-6 hover:bg-gray-50">
						<div class="w-5 h-5 flex items-center justify-center rounded-full border mr-2">
							<div class="bg-green-500 w-3 h-3 rounded-full"></div>
						</div>
						<span class="text-gray-800">Z lewej</span>
					</button>
					<button
						class="rounded-md border border-bg-100 w-36 h-16 p-5 flex items-center font-display text-sm hover:bg-gray-50">
						<div class="w-5 h-5 flex items-center justify-center rounded-full border mr-2">
							<div class="bg-green-500 w-3 h-3 rounded-full hidden"></div>
						</div>
						<span class="text-gray-800">Z prawej</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Kolor
			osprzętu</div>
		<div class="flex items-center px-3 md:px-6">
			<div class="flex flex-wrap items-start">
				<div class="inline-flex flex-wrap flex-grow-0 w-auto relative">
					<button
						class="rounded-md border border-green-300 w-full md:w-56 p-5 flex flex-wrap items-center font-display text-sm md:mr-6 mb-6 md:mb-0 hover:bg-gray-50">
						<span class="text-gray-800">Biały</span>
						<div class="w-5 h-5 flex items-center justify-center rounded-full border ml-auto">
							<div class="bg-green-500 w-3 h-3 rounded-full"></div>
						</div>
						<img src="{{ asset('img/osprzet-bialy.png') }}" alt=""
							class="w-full w-40 h-40 object-cover mt-4">
					</button>
					<button
						class="rounded-md border border-bg-100 w-full md:w-56 p-5 flex flex-wrap items-center font-display text-sm hover:bg-gray-50">
						<span class="text-gray-800">Brązowy</span>
						<div class="w-5 h-5 flex items-center justify-center rounded-full border ml-auto">
							<div class="bg-green-500 w-3 h-3 rounded-full hidden"></div>
						</div>
						<img src="{{ asset('img/osprzet-bialy.png') }}" alt=""
							class="w-full w-40 h-40 object-cover mt-4">
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Rodzaj
			tkaniny</div>
		<div class="flex flex-wrap items-center px-3 md:px-6 mb-8">
			<div class="relative w-full lg:w-auto mb-6 lg:mb-0">
				<input type="text" placeholder="Szukaj materiału"
					class="h-12 w-full lg:w-96 rounded-md border p-4 text-sm border-bg-100" wire:model="searchMaterial"
					wire:keydown.debounce.200ms="search" />
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
					class="w-5 h-5 absolute top-1/2 transform -translate-y-1/2 right-4">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg>
			</div>
			<div class="flex items-center w-full lg:w-auto lg:ml-auto">
				<button
					class="flex items-center justify-between rounded-md border h-12 w-1/2 lg:w-32 p-4 text-sm text-gray-500 hover:bg-gray-50">
					<span>Kolory</span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</button>
				<button
					class="flex items-center justify-between rounded-md border h-12 w-1/2 lg:w-32 p-4 text-sm text-gray-500 ml-2 hover:bg-gray-50">
					<span>Kolekcje</span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</button>
			</div>
		</div>
		<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 px-3 md:px-6 mb-6">
			@foreach($materials as $material)
			<button class="rounded-md border hover:bg-gray-50 p-5 flex flex-wrap"
				wire:click.debounce.200ms="toggleSelect">
				<div class="flex flex-col text-left font-display text-gray-800">
					<span>{{ $material['name'] }}</span>
					<span class="text-xs text-gray-400">{{ $material['code'] }}</span>
				</div>
				<div class="w-5 h-5 flex items-center justify-center rounded-full border ml-auto">
					<div class="bg-green-500 w-3 h-3 rounded-full"></div>
				</div>
				<img src="{{ asset('storage/'.$material['image']) }}" alt="" class="w-full h-52 my-4 object-cover">
				<span class="uppercase text-xs text-gray-400">Transparentny</span>
			</button>
			@endforeach
		</div>
		<div class="flex items-center justify-between px-3 md:px-6">
			<p class="text-gray-400 text-sm">{{ $totalMaterials }} dostępnych wyników</p>
			<div class="flex items-center text-gray-600">
				<button class="w-10 h-10 rounded bg-gray-50 flex items-center justify-center hover:bg-gray-100">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
					</svg>
				</button>
				<button
					class="w-10 h-10 rounded bg-green-500 text-white flex items-center justify-center mx-1">1</button>
				<button
					class="w-10 h-10 rounded bg-gray-50 flex items-center justify-center mx-1 hover:bg-gray-100">2</button>
				<button
					class="w-10 h-10 rounded bg-gray-50 flex items-center justify-center mx-1 hover:bg-gray-100">3</button>
				<button class="w-10 h-10 rounded bg-gray-50 flex items-center justify-center hover:bg-gray-100">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
					</svg>
				</button>
			</div>
		</div>
	</div>
</div>