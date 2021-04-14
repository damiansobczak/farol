@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('content')
<x-breadcrumbs
	:crumbs="[['name' => 'Kategorie', 'url' => route('admin.categories')], ['name' => 'Formularz kategorii', 'url' => '']]" />
@if(session('error'))
<div class="p-5 bg-red-200 text-red-700 rounded my-3">
	{{ session('error') }}
</div>
@endif
<form
	action="@if(isset($category->id)) {{ route('admin.categories.editSave', $category->id) }} @else {{ route('admin.categories.save') }} @endif"
	method="POST" enctype="multipart/form-data">
	@csrf
	@if(isset($category->id))
	{{ method_field('PUT') }}
	@endif
	<div class="flex">
		<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white ml-auto">Zapisz</button>
	</div>
	<div class="flex rounded shadow-sm bg-white p-8 mt-4 flex-wrap">
		<h2 class="uppercase text-gray-600 text-sm font-semibold border-b border-gray-100 pb-4 mb-4 w-full">Treść</h2>
		<div class="flex flex-col flex-1 border-gray-200 pr-6">
			@if(isset($category) && $category->image)
			<img src="{{ $category->getImgAttribute() }}" class="object-cover bg-gray-100 h-64 rounded">
			@else
			<div class="object-cover bg-gray-100 h-64 rounded"></div>
			@endif
			<label for="image" class="text-sm text-gray-500 font-semibold block mt-4">
				Obrazek
				<input type="file" name="image" id="image"
					value="@if($errors->any()){{ old('image') }}@else{{ $category->image ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('image')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
			<label for="imageAlt" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis obrazka
				<input type="text" name="imageAlt" id="imageAlt"
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $category->imageAlt ?? NULL }}@endif"
					class="foutline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
		</div>
		<div class="flex-1 flex-col pl-6">
			<label for="name" class="text-sm text-gray-500 font-semibold block">
				Nazwa
				<input type="text" name="name"
					value="@if($errors->any()){{ old('name') }}@else{{ $category->name ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('name')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
		</div>
	</div>
</form>

@if(isset($category))
<div class="flex rounded shadow-sm bg-white mt-8">
	<form action="{{ route('admin.categories.delete', $category->id) }}" method="POST"
		class="flex rounded shadow-sm bg-white p-8 w-full items-center justify-between">
		@csrf
		{{ method_field('DELETE') }}
		<div class="flex-1">
			<h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
			<p class="text-sm text-gray-500">Klikając tę opcję usuniesz kategorię oraz wyczyścisz zdjęcia
				przypisane do niej.</p>
		</div>
		<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
			onclick="return confirm('Czy chcesz usunąć tę kategorię?')">Usuń</button>
	</form>
</div>
@endif
@endsection