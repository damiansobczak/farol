@extends('layouts/admin-general')
@section('title', 'Aktualności')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Aktualności', 'url' => route('admin.posts')], ['name' => 'Nowy post', 'url' => '']]" />
		@if(isset($post))
		<form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" class="flex flex-col" >
			@csrf
			{{ method_field('DELETE') }}
			<div class="flex">
				<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć ten post?')">Usuń</button>
			</div>
		</form>
	@endif
	<form action="@if(isset($post)) {{ route('admin.posts.edit', $post->id) }} @else {{ route('admin.posts.create') }} @endif" method="POST" enctype="multipart/form-data">
		@csrf
		@if(isset($post->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>
		<div class="rounded shadow-sm bg-white p-8 flex">
				<div class="flex-1 border-r border-gray-200 pr-6">
					@isset($post->photo)
						<img src="{{ $post->photo }}" class="object-cover w-full bg-gray-100 h-64 rounded" />
					@endisset
					<label for="image" class="text-sm text-gray-400 mt-4 block">
						<p class="mb-2 text-gray-500">Obrazek:</p>
						<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="file" name="image" id="image" >
					</label>
					<label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
						<p class="mb-2 text-gray-500">Alt:</p>
						<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()) {{ old('imageAlt') }} @else {{ $post->imageAlt ?? NULL }} @endif">
					</label>
				</div>
				<div class="flex-1 pl-6">
					<label for="title" class="text-sm text-gray-400 mt-4 block">
						<p class="mb-2 text-gray-500">Tytuł:</p>
						<input required class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="title" id="title" placeholder="Tytuł strony" value="@if($errors->any()) {{ old('title') }} @else {{ $post->title ?? NULL }} @endif">
					</label>
					<label for="description" class="text-sm text-gray-400 my-4 block">
						<p class="mb-2 text-gray-500">Opis:</p>
						<textarea required class="h-64 font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="description" id="description" placeholder="Wpis">
							@if($errors->any()){{ old('description') }}@else{{ $post->description ?? NULL }}@endif
						</textarea>
					</label>
					<input type="hidden" name="show" class="hidden" @if(isset($post) && !$post->show) {{ 'checked' }} @endif value="0">
					<label for="show" class="flex items-center block cursor-pointer mb-3">
						<input type="checkbox" id="show" name="show" class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" @if(isset($post) && $post->show) {{ 'checked' }} @endif value="1">
						<p class="text-sm text-gray-500 ml-2 font-light">Aktywny</p>
					</label>
				</div>
		</div>
		<div class="rounded shadow-sm bg-white px-8 pb-8 pt-2 mt-3 flex flex-col">
			<div class="flex items-center justify-between font-medium text-sm text-gray-600 border-b border-gray-200 py-4">
				SEO
				<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
				</svg>
			</div>
				<div class="flex">
					<div class="flex-1 border-r border-gray-200 pr-6">
						<label for="seoTitle" class="text-sm text-gray-400 mt-4 block">
							<p class="mb-2 text-gray-500">Tytuł:</p>
							<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="seoTitle" id="seoTitle" value="@if($errors->any()) {{ old('seoTitle') }} @else {{ $post->seoTitle ?? NULL }} @endif" >
						</label>
						<label for="seoDescription" class="text-sm text-gray-400 mt-4 block">
							<p class="mb-2 text-gray-500">Opis:</p>
							<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="seoDescription" id="seoDescription" value="@if($errors->any()) {{ old('seoDescription') }} @else {{ $post->seoDescription ?? NULL }} @endif">
						</label>
					</div>
					<div class="flex-1 pl-6">
						<label for="ogTitle" class="text-sm text-gray-400 mt-4 block">
							<p class="mb-2 text-gray-500">Og Title:</p>
							<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="ogTitle" id="ogTitle" value="@if($errors->any()) {{ old('ogTitle') }} @else {{ $post->ogTitle ?? NULL }} @endif">
						</label>
						<label for="ogDescription" class="text-sm text-gray-400 mt-4 block">
							<p class="mb-2 text-gray-500">Og Description:</p>
							<input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="ogDescription" id="ogDescription" value="@if($errors->any()) {{ old('ogDescription') }} @else {{ $post->ogDescription ?? NULL }} @endif">
						</label>
					</div>
				</div>
		</div>
	</form>
@endsection
