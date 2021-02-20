<nav aria-label="Main Navigation"
	class="container mx-auto text-sm flex items-center py-5 justify-between relative border-b border-gray-100 z-40">
	<div class="font-semibold lg:flex items-center hidden">Sklep firmowy FAROL
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-2 h-4">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
		</svg>
	</div>
	<button class="flex items-center cursor-pointer hover:opacity-70 md:hidden" id="menu-trigger">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 mr-2">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
		</svg>
		<p class="uppercase text-sm text-gray-800 font-medium">Menu</p>
	</button>
	<ul class="md:flex items-center hidden absolute md:static top-full bg-white rounded-sm shadow-lg leading-10	w-64 md:w-auto md:shadow-none"
		id="menu">
		<li>
			<a href="{{ route('main') }}" class="px-3 py-2 hover:text-green-600 font-medium">Strona Główna</a>
		</li>
		<li>
			<a href="{{ route('company') }}" class="px-3 py-2 hover:text-green-600 font-medium">O nas</a>
		</li>
		<li>
			<a href="#" class="px-3 py-2 hover:text-green-600 font-medium" id="menu-popover-trigger"
				aria-expanded="false">Produkty</a>
			<div class="flex flex-col md:flex-row bg-none bg-transparent md:bg-white w-full mx-auto max-w-fluid md:fixed left-0 right-0 md:top-52 lg:top-44 border border-gray-100 py-2 md:py-6 hidden opacity-0"
				id="menu-popover">
				<div
					class="bg-gray-100 md:bg-transparent border-r border-gray-100 border-solid px-3 md:px-5 font-medium w-full md:w-64 mb-3 md:mb-0 text-gray-800">
					Nasz asortyment
				</div>
				<ul class="flex flex-col md:flex-row md:items-center px-3 md:px-8 justify-between flex-1 leading-10">
					@if(isset($headCategories))
					@foreach($headCategories as $category)
					<li>
						<a href="#"
							class="text-sm md:text-center flex flex-col md:items-center hover:opacity-75 mb-4 md:mb-0">
							<img src="{{ $category->image ? $category->img : asset('produkt.png') }}"
								alt="{{ $category->imageAlt }}" class="hidden md:block object-cover h-28 mb-3">
							<span class="text-gray-800 font-medium">{{ $category->name }}</span>
							<span class="text-xs text-gray-400">już od {{ $category->cheapestProduct->startingPrice }}
								PLN</span>
						</a>
					</li>
					@endforeach
					@endif
				</ul>
			</div>
		</li>
		<li>
			<a href="{{ route('realisations') }}" class="px-3 py-2 hover:text-green-600 font-medium">Realizacje</a>
		</li>
		<li>
			<a href="#" class="px-3 py-2 hover:text-green-600 font-medium">Kontakt</a>
		</li>
	</ul>
	<ul class="flex items-center">
		<li>
			<a href="{{ route('customer.login') }}" class="flex flex-col items-center hover:text-green-600">
				<span class="flex items-center justify-center text-center w-20 h-6">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-7 h-7">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
							d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
					</svg>
				</span>
				<span class="font-medium pt-2">Twoje Konto</span>
			</a>
		</li>
		<li>
			<a href="#" class="flex flex-col items-center hover:text-green-600">
				<span class="flex items-center justify-center text-center w-20 h-6">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="w-7 h-7">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
							d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
					</svg>
				</span>
				<span class="font-medium pt-2">Koszyk</span>
			</a>
		</li>
	</ul>
</nav>