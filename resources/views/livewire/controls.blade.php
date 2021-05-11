<div class="w-full flex flex-col lg:pl-8">
	<div class="w-full mb-16">
		<div class="bg-gray-50 p-6 rounded-md text-gray-800 mr-4 font-display font-medium text-sm mb-6 w-full">Rodzaj
			tkaniny</div>
		<div class="flex flex-wrap items-center px-3 md:px-6 mb-8">
			<div class="relative w-full lg:w-auto mb-6 lg:mb-0">
				<input type="text" placeholder="Szukaj materiału"
					class="text-sm text-secondary rounded-md border-gray-300 focus:border-green-300 focus:ring h-12 w-80 focus:ring-green-200 focus:ring-opacity-50"
					wire:model="search" wire:keydown.debounce.400ms="searchMaterial" />
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
					class="w-5 h-5 absolute top-1/2 transform -translate-y-1/2 right-4">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
				</svg>
			</div>
			<div class="flex items-center w-full lg:w-auto lg:ml-auto space-x-4">
				<select name="colors" id="colors"
					class="text-sm text-secondary rounded-md border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 h-12"
					wire:model="selectedColor">
					<option value="">Kolor</option>
					@foreach ($colors as $color)
					<option value="{{ $color->id }}">
						{{ $color->name }}</option>
					@endforeach
				</select>
				<select name="collections" id="collections"
					class="text-sm text-secondary rounded-md border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 h-12"
					wire:model="selectedCollection">
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
	</div>
</div>