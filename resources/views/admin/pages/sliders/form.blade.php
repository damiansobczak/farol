@extends('layouts/admin-general')
@section('title', 'Banery')
@section('content')
<x-breadcrumbs
	:crumbs="[['name' => 'Banery', 'url' => route('admin.sliders')], ['name' => 'Nowy baner', 'url' => '']]" />
<form
	action="@if(isset($slider)) {{ route('admin.sliders.edit', $slider->id) }} @else {{ route('admin.sliders.create') }} @endif"
	method="POST" enctype="multipart/form-data">
	@csrf
	@if(isset($slider->id))
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
		<div class="flex flex-col border-gray-200 w-1/2">
			@if(isset($slider) && $slider->photo)
			<img src="{{ $slider->photo }}" class="object-cover bg-gray-100 h-64 rounded mb-4">
			@endif
			<label for="image" class="text-sm text-gray-500 font-semibold block">
				Obrazek
				<input type="file" name="image" id="image"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('image')
				<div class="p-2 bg-red-200 text-red-700 rounded my-3">Obrazek nie powinien być większy niż 512kB.</div>
				@enderror
			</label>
			<label for="imageAlt" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis obrazka
				<input type="text" name="imageAlt" id="imageAlt"
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $slider->imageAlt ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
		</div>
		<div class="flex flex-col w-1/2 pl-4">
			<label for="title" class="text-sm text-gray-500 font-semibold block">
				Tytuł
				<input type="text" name="title" id="title"
					value="@if($errors->any()){{ old('title') }}@else{{ $slider->title ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
			<label for="description" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis
				<input type="text" name="description" id="description"
					value="@if($errors->any()){{ old('description') }}@else{{ $slider->description ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
			<label for="actionName" class="text-sm text-gray-500 font-semibold block mt-4">
				Tekst na przycisku
				<input type="text" name="actionName" id="actionName"
					value="@if($errors->any()){{ old('actionName') }}@else{{ $slider->actionName ?? NULL }}@endif"
					class="foutline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
			<label for="actionLink" class="text-sm text-gray-500 font-semibold block mt-4">
				Link przycisku
				<input type="text" name="actionLink" id="actionLink"
					value="@if($errors->any()){{ old('actionLink') }}@else{{ $slider->actionLink ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
		</div>
	</div>

	<div class="rounded shadow-sm bg-white px-8 pb-8 pt-2 mt-3 flex flex-col flex-wrap">
		<div
			class="flex items-center justify-between font-medium text-sm text-gray-600 border-b border-gray-200 py-4 mb-4">
			Obrazek jako slider
		</div>
		<div class="flex mt-2">
			<div class="flex flex-col w-1/2 mr-5">
				@if(isset($slider) && $slider->onlyPhoto)
				<img src="{{ $slider->onlyPhoto }}" class="object-cover bg-gray-100 h-64 rounded mb-5">
				@endif
				<label for="onlyImage" class="text-sm text-gray-500 font-semibold block">
					Obrazek
					<input type="file" type="text" name="onlyImage" id="onlyImage"
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
					@error('onlyImage')
					<div class="p-2 bg-red-200 text-red-700 rounded my-3">Obrazek nie powinien być większy niż 512kB.
					</div>
					@enderror
				</label>
			</div>
			<label for="onlyImageLink" class="text-sm text-gray-500 font-semibold block w-1/2">
				Link
				<input type="text" name="onlyImageLink" id="onlyImageLink"
					value="@if($errors->any()){{ old('onlyImageLink') }}@else{{ $slider->onlyImageLink ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
		</div>
	</div>
</form>

@if(isset($slider))
<form action="{{ route('admin.sliders.delete', $slider->id) }}" method="POST"
	class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
	@csrf
	{{ method_field('DELETE') }}
	<div class="flex-1">
		<h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
		<p class="text-sm text-gray-500">Klikając tę opcję usuniesz slider oraz wyczyścisz zdjęcia
			przypisane do niego.</p>
	</div>
	<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
		onclick="return confirm('Czy chcesz usunąć ten slider?')">Usuń</button>
</form>
@endif
@endsection