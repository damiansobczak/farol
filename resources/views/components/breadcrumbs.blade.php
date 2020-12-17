<div class="mb-5">
	<p class="mb-2 font-medium text-lg">@yield('title')</p>
	@isset($crumbs)
		<ol class="flex flex-row">
			<li class="flex items-center text-indigo-500 hover:underline">
				<a class="text-xs" href="{{ route('admin.dashboard') }}">Dashboard</a>
				<svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</li>
			@foreach($crumbs as $crumb)
				@if($loop->last)
					<li class="text-gray-400 text-xs">{{ $crumb['name'] }}</li>
				@else
					<li class="flex items-center text-indigo-500 hover:underline">
						<a class="text-xs" href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a>
						<svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
				@endif
			@endforeach
		</ol>
	@endisset
</div>