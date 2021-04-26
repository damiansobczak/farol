<div class="w-full lg:w-9/12 flex flex-col lg:pl-8">
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Rodzaj
			tkaniny</div>
		<div class="flex flex-wrap items-center px-3 md:px-6 mb-8">
			<div class="relative w-full lg:w-auto mb-6 lg:mb-0">
				<input type="text" placeholder="Szukaj materiału"
					class="h-12 w-full lg:w-96 rounded-md border p-4 text-sm border-bg-100" wire:model="search"
					wire:keydown.debounce.400ms="searchMaterial" />
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
					class="w-5 h-5 absolute top-1/2 transform -translate-y-1/2 right-4">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg>
			</div>
			<div class="flex items-center w-full lg:w-auto lg:ml-auto space-x-4">
				<select name="colors" id="colors" class=" outline-none appearance-none text-gray-400 font-light hover:border-indigo-200
				placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4
				mt-2 w-32 p-2 h-10 rounded border border-gray-200" wire:model="selectedColor">
					<option value="">Kolor</option>
					@foreach ($colors as $color)
					<option value="{{ $color->id }}">
						{{ $color->name }}</option>
					@endforeach
				</select>
				<select name="collections" id="collections" class=" outline-none appearance-none text-gray-400 font-light hover:border-indigo-200
				placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4
				mt-2 w-32 p-2 h-10 rounded border border-gray-200" wire:model="selectedCollection">
					<option value="">Kolekcja</option>
					@foreach ($collections as $collection)
					<option value="{{ $collection->id }}">
						{{ $collection->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 px-3 md:px-6 mb-6">
			@isset($filtered)
			@foreach($filtered as $material)
			<div class="rounded-md border hover:bg-gray-50 p-5 flex flex-wrap">
				<div class="flex flex-col text-left font-display text-gray-800">
					<span>{{ $material->name }}</span>
					<span class="text-xs text-gray-400">{{ $material->code }}</span>
				</div>
				<div class="w-5 h-5 flex items-center justify-center rounded-full border ml-auto">
					<div class="bg-green-500 w-3 h-3 rounded-full"></div>
				</div>
				<img src="{{ $material->photo }}" alt="" class="w-full h-52 my-4 object-cover">
				<span class="uppercase text-xs text-gray-400">
					<b class="text-gray-800">Kolekcja</b>: {{ $material->collection->name ?? 'BRAK'}}
					<b class="text-gray-800">Kolor</b>: {{ $material->color->name ?? 'BRAK'}}
				</span>
			</div>
			@endforeach
			@endisset
		</div>
		<div class="flex items-center justify-between px-3 md:px-6">
			{{-- <p class="text-gray-400 text-sm">{{ $count }} dostępnych wyników</p> --}}
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