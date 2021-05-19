<nav aria-label="Main Navigation"
	class="container mx-auto text-sm flex items-center py-5 justify-between relative border-b border-gray-100 z-40">
	<div class="font-semibold lg:flex items-center hidden text-primary">Sklep firmowy FAROL
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="ml-2 h-4">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
		</svg>
	</div>
	<button class="flex items-center cursor-pointer hover:opacity-70 md:hidden" id="menu-trigger">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 mr-2">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
		</svg>
		<p class="uppercase text-sm text-primary font-medium">Menu</p>
	</button>
	<ul class="md:flex items-center hidden absolute md:left-1/2 transform md:-translate-x-1/2 md:top-1/2 md:-translate-y-1/2 top-full bg-white rounded-sm shadow-lg leading-10	w-64 md:w-auto md:shadow-none"
		id="menu">
		<li>
			<a href="{{ route('main') }}" class="px-3 py-2 hover:text-green-600 font-medium">Strona Główna</a>
		</li>
		<li>
			<a href="{{ route('company') }}" class="px-3 py-2 hover:text-green-600 font-medium">O nas</a>
		</li>
		<li>
			<a href="{{ route('products') }}" class="px-3 py-2 hover:text-green-600 font-medium"
				id="menu-popover-trigger" aria-expanded="false">Produkty</a>
		</li>
		<li>
			<a href="{{ route('realisations') }}" class="px-3 py-2 hover:text-green-600 font-medium">Realizacje</a>
		</li>
		<li>
			<a href="{{ route('contact') }}" class="px-3 py-2 hover:text-green-600 font-medium">Kontakt</a>
		</li>
	</ul>
</nav>