<section class="px-3 mx-auto mb-24 max-w-fluid">
	<div class="container mx-auto">
		<div class="flex items-end justify-between mb-5">
			<div>
				<div class="h-1 mb-6 bg-green-500 rounded w-52"></div>
				<h3 class="text-2xl font-semibold text-primary font-display">Aktualności</h3>
			</div>
			@if ($posts->count() > 3)
				<a href="{{ route('posts') }}"
					class="flex items-center justify-center py-3 text-sm text-green-500 transition-colors font-display hover:text-green-600">Zobacz
					więcej
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
						class="h-4 ml-2">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M17 8l4 4m0 0l-4 4m4-4H3" />
					</svg>
				</a>
			@endif
		</div>
		<div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
			@foreach($posts as $post)
			<div class="flex w-full md:flex-col">
				<img src="{{ $post->image ? $post->photo : asset('img/slider-1.png') }}" alt="{{ $post->imageAlt }}"
					class="object-cover w-1/5 h-24 mr-6 md:mr-0 md:h-80 rounded-tl-3xl rounded-br-3xl md:w-full" />
				<div class="w-4/5 md:mt-5">
					<h5 class="text-lg font-semibold text-primary font-display">{{ $post->title }}
					</h5>
					<div class="mt-2 text-sm leading-6 text-secondary">
						{!! Str::limit($post->description, 160, '...') !!}
					</div>
					<a href="{{ route('post', $post->slug) }}"
						class="inline-flex items-center justify-center py-3 text-sm text-green-500">Przeczytaj
						więcej
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
							class="h-4 ml-2">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 8l4 4m0 0l-4 4m4-4H3" />
						</svg>
					</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>