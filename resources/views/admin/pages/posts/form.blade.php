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
		<button type="submit" class="px-4 py-2 mb-4 ml-auto text-white bg-indigo-500 rounded">Zapisz</button>
	</div>
	<div class="flex flex-wrap p-8 bg-white rounded shadow-sm">
		<div
			class="flex items-center justify-between w-full pb-4 mb-4 text-sm font-medium text-gray-600 border-b border-gray-200">
			Treść
		</div>
		<div class="flex-1 pr-6 border-r border-gray-200">
			@isset($post->photo)
			<img src="{{ $post->photo }}" class="object-cover w-full h-64 bg-gray-100 rounded" />
			@endisset
			<label for="image" class="block mt-4 text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Obrazek:</p>
				<input
					class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
					type="file" name="image" id="image">
			</label>
			<label for="imageAlt" class="block mt-4 text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Alt:</p>
				<input
					class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
					type="text" name="imageAlt" id="imageAlt"
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $post->imageAlt ?? NULL }}@endif">
			</label>
			<label for="gallery" class="block mt-4 text-sm font-semibold text-gray-500">
					Galeria
					<input type="file" name="gallery[]" id="gallery" multiple="multiple"
						value="@if($errors->any()){{ old('image') }}@else{{ $post->image ?? NULL }}@endif"
						class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4">
					@error('gallery')
					<div class="p-2 mt-2 text-red-500 rounded bg-red-50">
						{{ $message }}
					</div>
					@enderror
				</label>
				@if (isset($post) && $post->galleryPhotos)
				<div class="flex flex-wrap p-4 my-4 space-x-4 border rounded bg-gray-50">
					@foreach ($post->galleryPhotos as $gallery)
					<img src="{{ $gallery }}" class="object-cover w-16 h-16 rounded" alt="">
					@endforeach
				</div>
				@endif
		</div>
		<div class="flex-1 pl-6">
			<label for="title" class="block text-sm font-semibold text-gray-500">
				<p class="mb-2 text-gray-500">Tytuł:</p>
				<input required
					class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
					type="text" name="title" id="title" placeholder="Tytuł strony"
					value="@if($errors->any()){{ old('title') }}@else{{ $post->title ?? NULL }}@endif">
			</label>
			<label for="description" class="block mt-4 text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Opis:</p>
				<textarea required
					class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none ckeditor hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
					type="text" name="description" id="description"
					placeholder="Wpis">@if($errors->any()){{ old('description') }}@else{{ $post->description ?? NULL }}@endif</textarea>
			</label>
			<input type="hidden" name="show" class="hidden" @if(isset($post) && !$post->show) {{ 'checked' }} @endif
			value="0">
			<label for="show" class="flex items-center block mt-4 mb-3 cursor-pointer">
				<input type="checkbox" id="show" name="show"
					class="w-5 h-5 border border-gray-300 rounded outline-none appearance-none checked:bg-indigo-500"
					@if(isset($post) && $post->show) {{ 'checked' }} @endif value="1">
				<p class="ml-2 text-sm font-light text-gray-500">Aktywny</p>
			</label>
		</div>
	</div>
</form>

@if(isset($post))
<form action="{{ route('admin.posts.delete', $post->id) }}" method="POST"
	class="flex items-center justify-between w-full p-8 mt-8 bg-white rounded shadow-sm">
	@csrf
	{{ method_field('DELETE') }}
	<div class="flex-1">
		<h3 class="text-lg font-semibold text-gray-700">Uwaga!</h3>
		<p class="text-sm text-gray-500">Klikając tę opcję usuniesz post oraz wyczyścisz zdjęcia
			przypisane do niego.</p>
	</div>
	<button type="submit" class="px-4 py-2 mb-4 ml-auto mr-3 text-white bg-red-500 rounded"
		onclick="return confirm('Czy chcesz usunąć ten post?')">Usuń</button>
</form>
@endif
@endsection

@section('scripts')
@livewireScripts
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'editor1' );
                </script>
@endsection