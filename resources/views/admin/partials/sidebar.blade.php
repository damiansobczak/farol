<aside class="h-full w-1/6 bg-gray-800">
	<div class="flex items-center justify-between h-20 border-b border-gray-700 px-5">
		<div class="font-bold text-base text-white">UICLOUD | <span class="font-light text-gray-400"> Farol Admin</span>
		</div>
	</div>
	{{--  Shop--}}
	<div class="mt-6">
		<p class="px-5 font-light uppercase text-xs text-gray-400 tracking-wider mb-3">Ogólne</p>
		<nav class="text-gray-200">
			<ul>
				<li>
					<a href="{{ route('admin.dashboard') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path
								d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
						</svg>
						Dashboard</a>
				</li>
			</ul>
		</nav>
	</div>

	{{--  Shop--}}
	<div class="mt-6">
		<p id="shop-nav" class="px-5 font-light uppercase text-xs text-gray-400 tracking-wider mb-3">Sklep</p>
		<nav class="text-gray-200" aria-labelledby="shop-nav">
			<ul>
				<li>
					<a href="{{ route('admin.products') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path fill-rule="evenodd"
								d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
								clip-rule="evenodd" />
						</svg>
						Produkty</a>
				</li>
				<li>
					<a href="{{ route('admin.categories') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path fill-rule="evenodd"
								d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
								clip-rule="evenodd" />
						</svg>
						Kategorie</a>
				</li>
				<li>
					<a href="{{ route('admin.materials') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="16" width="16" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
						</svg>
						Materiały</a>
				</li>
				<li>
					<a href="{{ route('admin.attributes') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="16" widht="16" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
						Atrybuty</a>
				</li>
				<li>
					<a href="{{ route('admin.groups') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="16" width="16" fill="none"
							viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
						</svg>
						Kolekcje i kolory</a>
				</li>
			</ul>
		</nav>
	</div>

	{{-- CMS--}}
	<div class="mt-6">
		<p id="cms-nav" class="px-5 font-light uppercase text-xs text-gray-400 tracking-wider mb-3">Treść</p>
		<nav class="text-gray-200" aria-labelledby="cms-nav">
			<ul>
				<li>
					<a href="{{ route('admin.sliders') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path
								d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
						</svg>
						Slider</a>
				</li>
				<li>
					<a href="{{ route('admin.realisations') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path fill-rule="evenodd"
								d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
								clip-rule="evenodd" />
						</svg>
						Realizacje</a>
				</li>
				<li>
					<a href="{{ route('admin.posts') }}"
						class="text-sm w-full block px-5 py-2 hover:bg-gray-700 flex items-center">
						<svg class="mr-2" height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
							fill="currentColor">
							<path fill-rule="evenodd"
								d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
								clip-rule="evenodd" />
							<path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
						</svg>
						Aktualności</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<script type="text/javascript">
	let menuItems = document.querySelectorAll('a');
	for(let i = 0; i < menuItems.length; i++)
	{
		if(menuItems[i].href == window.location.href.match('^http(s?)://[^/]*/[^/]*(/[^/]*)?')[0])
		{
			menuItems[i].className += ' bg-indigo-500 font-medium text-white';
		}
	}
</script>