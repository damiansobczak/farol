@extends('layouts/admin-general')
@section('title', 'Realizacje')
@section('content')
<x-breadcrumbs
	:crumbs="[['name' => 'Realizacje', 'url' => route('admin.realisations')], ['name' => 'Nowa realizacja', 'url' => '']]" />
<form
	action="@if(isset($realisation)) {{ route('admin.realisations.edit', $realisation->id) }} @else {{ route('admin.realisations.create') }} @endif"
	method="POST" enctype="multipart/form-data">
	@csrf
	@if(isset($realisation->id))
	{{ method_field('PUT') }}
	@endif
	<div class="flex">
		<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4 ml-auto">Zapisz</button>
	</div>

	<div class="flex rounded shadow-sm bg-white p-8 flex-wrap">
		<div
			class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
			Treść
		</div>
		<div class="w-1/2">
			<label for="title" class="text-sm text-gray-500 font-semibold block">
				Tytuł
				<input type="text" name="title" id="title"
					value="@if($errors->any()){{ old('title') }}@else{{ $realisation->title ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('title')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
				@enderror
			</label>
			<label for="description" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis
				<input type="text" name="description" id="description"
					value="@if($errors->any()){{ old('description') }}@else{{ $realisation->description ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('description')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
				@enderror
			</label>
			@if (isset($realisation) && $realisation->photo)
			<img src="{{ $realisation->photo }}" width="320" height="240" alt="">
			@endif
			<label for="image" class="text-sm text-gray-500 font-semibold block mt-4">
				Obrazek
				<input type="file" name="image" id="image"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('image')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane. Obrazek nie powinien być
					większy
					niż 512kB.</div>
				@enderror
			</label>
			<label for="imageAlt" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis obrazka
				<input type="text" name="imageAlt" id="imageAlt"
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $realisation->imageAlt ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('imageAlt')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
				@enderror
			</label>
		</div>

		<div class="w-1/2 pl-6">
			@if (isset($realisation) && $realisation->movie)
			<video width="320" height="240">
				<source src="{{ $realisation->movie }}" type="video/mp4">
			</video>
			@endif
			<label for="video" class="text-sm text-gray-500 font-semibold block">
				Video
				<input type="file" name="video" id="video"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('video')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Video nie powinno być większe niż 2048kB (2MB).
					Dozwolony
					format mp4</div>
				@enderror
			</label>
			@if (isset($realisation) && $realisation->galleryPhotos)
			@foreach ($realisation->galleryPhotos as $gallery)
			<img src="{{ $gallery }}" alt="">
			@endforeach
			@endif
			<label for="gallery" class="text-sm text-gray-500 font-semibold block mt-4">
				Galeria
				<input type="file" name="gallery[]" id="gallery" multiple="multiple"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('gallery')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Zdjęcie nie powinno być większe niż 256kB</div>
				@enderror
			</label>
		</div>
	</div>

	<div class="flex flex-wrap rounded shadow-sm p-8 bg-white mt-8">
		<div
			class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
			SEO
		</div>
		<div class="w-1/2">
			<label for="seoTitle" class="text-sm text-gray-500 font-semibold block">
				seoTitle
				<input type="text" name="seoTitle" id="seoTitle"
					value="@if($errors->any()){{ old('seoTitle') }}@else{{ $realisation->seoTitle ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('seoTitle')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
				@enderror
			</label>
			<label for="seoDescription" class="text-sm text-gray-500 font-semibold block mt-4">
				seoDescription
				<input type="text" name="seoDescription" id="seoDescription"
					value="@if($errors->any()){{ old('seoDescription') }}@else{{ $realisation->seoDescription ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('seoDescription')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
				@enderror
			</label>
		</div>

		<div class="w-1/2 pl-6">
			<label for="ogTitle" class="text-sm text-gray-500 font-semibold block">
				ogTitle
				<input type="text" name="ogTitle" id="ogTitle"
					value="@if($errors->any()){{ old('ogTitle') }}@else{{ $realisation->ogTitle ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('ogTitle')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
				@enderror
			</label>
			<label for="ogDescription" class="text-sm text-gray-500 font-semibold mt-4 block">
				ogDescription
				<input type="text" name="ogDescription" id="ogDescription"
					value="@if($errors->any()){{ old('ogDescription') }}@else{{ $realisation->ogDescription ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('ogDescription')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
				@enderror
			</label>
		</div>
	</div>
</form>

@if(isset($realisation))
<form action="{{ route('admin.realisations.delete', $realisation->id) }}" method="POST"
	class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
	@csrf
	{{ method_field('DELETE') }}
	<div class="flex-1">
		<h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
		<p class="text-sm text-gray-500">Klikając tę opcję usuniesz realizacje oraz wyczyścisz zdjęcia
			przypisane do niej.</p>
	</div>
	<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
		onclick="return confirm('Czy chcesz usunąć tę realizacje?')">Usuń</button>
</form>
@endif
@endsection