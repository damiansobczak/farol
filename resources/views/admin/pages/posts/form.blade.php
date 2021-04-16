@extends('layouts/admin-general')
@section('title', 'Aktualności')
@section('content')
<x-breadcrumbs
	:crumbs="[['name' => 'Aktualności', 'url' => route('admin.posts')], ['name' => 'Nowy post', 'url' => '']]" />
<form
	action="@if(isset($post)) {{ route('admin.posts.edit', $post->id) }} @else {{ route('admin.posts.create') }} @endif"
	method="POST" enctype="multipart/form-data">
	@csrf
	@if(isset($post->id))
	{{ method_field('PUT') }}
	@endif
	<div class="flex">
		<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4 ml-auto">Zapisz</button>
	</div>
	<div class="rounded shadow-sm bg-white p-8 flex flex-wrap">
		<div
			class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
			Treść
		</div>
		<div class="flex-1 border-r border-gray-200 pr-6">
			@isset($post->photo)
			<img src="{{ $post->photo }}" class="object-cover w-full bg-gray-100 h-64 rounded" />
			@endisset
			<label for="image" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Obrazek:</p>
				<input
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
					type="file" name="image" id="image">
			</label>
			<label for="imageAlt" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Alt:</p>
				<input
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
					type="text" name="imageAlt" id="imageAlt"
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $post->imageAlt ?? NULL }}@endif">
			</label>
		</div>
		<div class="flex-1 pl-6">
			<label for="title" class="text-sm text-gray-500 font-semibold block">
				<p class="mb-2 text-gray-500">Tytuł:</p>
				<input required
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
					type="text" name="title" id="title" placeholder="Tytuł strony"
					value="@if($errors->any()){{ old('title') }}@else{{ $post->title ?? NULL }}@endif">
			</label>
			<label for="description" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Opis:</p>
				<textarea required
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
					type="text" name="description" id="description"
					placeholder="Wpis">@if($errors->any()){{ old('description') }}@else{{ $post->description ?? NULL }}@endif</textarea>
			</label>
			<input type="hidden" name="show" class="hidden" @if(isset($post) && !$post->show) {{ 'checked' }} @endif
			value="0">
			<label for="show" class="flex items-center block cursor-pointer mb-3 mt-4">
				<input type="checkbox" id="show" name="show"
					class="h-5 w-5 border border-gray-300 rounded checked:bg-indigo-500 appearance-none outline-none"
					@if(isset($post) && $post->show) {{ 'checked' }} @endif value="1">
				<p class="text-sm text-gray-500 ml-2 font-light">Aktywny</p>
			</label>
		</div>
	</div>
	<div class="rounded shadow-sm bg-white px-8 pb-8 pt-2 mt-3 flex flex-col">
		<div
			class="flex items-center justify-between font-medium text-sm text-gray-600 border-b border-gray-200 py-4 mb-4">
			SEO
		</div>
		<div class="flex">
			<div class="flex-1 pr-6">
				<label for="seoTitle" class="text-sm text-gray-500 font-semibold block">
					<p class="mb-2 text-gray-500">Tytuł:</p>
					<input
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
						type="text" name="seoTitle" id="seoTitle"
						value="@if($errors->any()){{ old('seoTitle') }}@else{{ $post->seoTitle ?? NULL }}@endif">
				</label>
				<label for="seoDescription" class="text-sm text-gray-500 font-semibold block mt-4"">
					<p class=" mb-2 text-gray-500">Opis:</p>
					<input
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
						type="text" name="seoDescription" id="seoDescription"
						value="@if($errors->any()){{ old('seoDescription') }}@else{{ $post->seoDescription ?? NULL }}@endif">
				</label>
			</div>
			<div class="flex-1 pl-6">
				<label for="ogTitle" class="text-sm text-gray-500 font-semibold block">
					<p class="mb-2 text-gray-500">Og Title:</p>
					<input
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
						type="text" name="ogTitle" id="ogTitle"
						value="@if($errors->any()){{ old('ogTitle') }}@else{{ $post->ogTitle ?? NULL }}@endif">
				</label>
				<label for="ogDescription" class="text-sm text-gray-500 font-semibold block mt-4">
					<p class="mb-2 text-gray-500">Og Description:</p>
					<input
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
						type="text" name="ogDescription" id="ogDescription"
						value="@if($errors->any()){{ old('ogDescription') }}@else{{ $post->ogDescription ?? NULL }}@endif">
				</label>
			</div>
		</div>
	</div>
</form>

@if(isset($post))
<form action="{{ route('admin.posts.delete', $post->id) }}" method="POST"
	class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
	@csrf
	{{ method_field('DELETE') }}
	<div class="flex-1">
		<h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
		<p class="text-sm text-gray-500">Klikając tę opcję usuniesz post oraz wyczyścisz zdjęcia
			przypisane do niego.</p>
	</div>
	<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
		onclick="return confirm('Czy chcesz usunąć ten post?')">Usuń</button>
</form>
@endif
@endsection