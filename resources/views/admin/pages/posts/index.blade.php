@extends('layouts/admin-general')
@section('title', 'Ustawienia')
@section('content')
<x-breadcrumbs :crumbs="[['name' => 'Spis aktualności', 'url' => '']]" />
<div class="flex flex-col">
	<a href="{{ route('admin.posts.create') }}" class="mb-5 ml-auto rounded px-4 py-2 bg-indigo-500 text-white">Utwórz
		wpis</a>
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">
				<table class="min-w-full divide-y divide-gray-200">
					<thead>
						<tr>
							<th scope="col"
								class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Obrazek
							</th>
							<th scope="col"
								class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Tytuł
							</th>
							<th scope="col"
								class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Slug
							</th>
							<th scope="col"
								class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Status
							</th>
							<th scope="col"
								class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
								Akcje
							</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						@foreach ($posts as $post)
						<tr>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="flex items-center">
									<div class="flex-shrink-0 h-10 w-10">
										<img class="h-10 w-10 rounded-full" src="{{ $post->photo }}" alt="">
									</div>
								</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900">{{ $post->title }}</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-400">{{ $post->slug }}</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap">
								<span
									class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->show ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
									{{ $post->show ? 'Aktywny' : 'Nieaktywny' }}
								</span>
							</td>
							<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
								<a href="{{ route('admin.posts.edit', $post->id) }}"
									class="text-indigo-600 hover:text-indigo-800">Edytuj</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="shadow-sm overflow-hidden rounded bg-white p-3 mt-3 flex items-center justify-between flex-no-wrap">
	<p class="text-sm text-gray-400">Wyświetlono {{$posts->total()}} postów</p>
	<div class="ml-auto text-sm">
		@if($posts->currentPage() !== 1)
		<a class="flex items-center cursor-pointer border border-gray-200 px-4 py-2 rounded-2xl hover:opacity-50"
			href="{{ $posts->previousPageUrl() }}">
			<svg class="h4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
			</svg>
			Poprzednia
		</a>
		@endif

		@if($posts->hasMorePages())
		<a class="flex items-center cursor-pointer border border-gray-200 px-4 py-2 rounded-2xl hover:opacity-50"
			href="{{ $posts->nextPageUrl() }}">
			Następna
			<svg class="h4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
			</svg>
		</a>
		@endif
	</div>
</div>
@endsection