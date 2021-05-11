<section class="max-w-fluid px-3 mx-auto mb-24">
	<div class="container mx-auto">
		<div class="flex items-end justify-between mb-5">
			<div>
				<div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
				<h3 class="font-semibold text-2xl text-primary font-display">Aktualności</h3>
			</div>
			<button
				class="flex items-center justify-center py-3 text-green-500 font-display text-sm hover:text-green-600 transition-colors">Zobacz
				więcej
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
					class="ml-2 h-4">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 8l4 4m0 0l-4 4m4-4H3" />
				</svg>
			</button>
		</div>
		<div class="flex items-stretch flex-wrap md:flex-nowrap space-x-6">
			@foreach($posts as $post)
			<div class="flex md:flex-col w-full md:w-1/3">
				<img src="{{ $post->image ? $post->photo : asset('img/slider-1.png') }}" alt="{{ $post->imageAlt }}"
					class="h-24 mr-6 md:mr-0 md:h-80 object-cover rounded-tl-3xl rounded-br-3xl w-1/5 md:w-full" />
				<div class="w-4/5 md:mt-5">
					<h5 class="text-primary font-semibold text-lg font-display">{{ $post->title }}
					</h5>
					<p class="text-secondary leading-6 text-sm mt-2">
						{{ Str::limit($post->description, 160, '...') }}
					</p>
					<button class="flex items-center justify-center py-3 text-green-500 text-sm">Przeczytaj więcej
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="ml-2 h-4">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 8l4 4m0 0l-4 4m4-4H3" />
						</svg>
					</button>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>