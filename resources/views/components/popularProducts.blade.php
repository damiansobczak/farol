<section class="max-w-fluid mx-auto mb-24">
	<div class="container mx-auto">
		<div class="flex items-end mb-4">
			<div>
				<div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
				<h3 class="font-semibold text-2xl text-primary font-display">Popularne produkty</h3>
				<p class="text-secondary my-2 font-light">Quisque lorem tortor fringilla sed, vestibulum.</p>
			</div>
			<div class="flex items-center ml-auto">
				<button class="rounded-full border border-gray-100 p-3 cursor-pointer hover:bg-gray-50"
					id="popular-left">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgb(31, 41, 55)"
						class="w-5 h-5">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
					</svg>
				</button>
				<button class="rounded-full border border-gray-100 p-3 cursor-pointer hover:bg-gray-50 mx-3"
					id="popular-right">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgb(31, 41, 55)"
						class="w-5 h-5">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
					</svg>
				</button>
			</div>
		</div>
		<div class="overflow-hidden">
			<div class="flex items stretch flex-nowrap w-full min-w-full transition-all" id="popular-products">
				@if(isset($featuredProducts))
				@foreach($featuredProducts as $product)
				<div class="flex-shrink-0 w-1/2 md:w-1/3 lg:w-1/5 px-2 -ml-2" id="popular-product">
					<div class="border px-3 py-6 text-center rounded-md relative group">
						<img src="{{ $product->image ? $product->img : asset('img/product.png') }}"
							alt="{{ $product->imageAlt }}" class="w-auto max-h-52 mx-auto" />
						<span class="uppercase text-xs text-gray-400">{{ $product->category->name }}</span>
						<p class="text-gray-800 font-semibold">{{ $product->name }}</p>
						<div
							class="rounded-md bg-green-500 flex items-center justify-center absolute bottom-2 opacity-0 w-3/4 py-3 left-1/2 transform -translate-x-2/4 cursor-pointer hover:bg-green-600 group-hover:opacity-100 transition-all">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#ffffff"
								class="w-5 h-5">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
							</svg>
							<a href="{{ route('product', $product->slug) }}"><span
									class="text-white ml-2 text-sm font-semibold">Skonfiguruj i kup</span></a>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>