@extends('layouts/admin-general')
@section('title', 'Produkty')
@section('content')
<x-breadcrumbs
	:crumbs="[['name' => 'Produkty', 'url' => route('admin.products')], ['name' => 'Formularz produktu', 'url' => '']]" />
<form
	action="@if(isset($product->id)) {{ route('admin.products.editSave', $product->id) }} @else {{ route('admin.products.save') }} @endif"
	method="POST" enctype="multipart/form-data">
	@csrf
	@if(isset($product->id))
	{{ method_field('PUT') }}
	@endif
	<div class="flex">
		<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4 ml-auto">Zapisz</button>
	</div>
	<div class="flex rounded shadow-sm bg-white p-8 flex-wrap">
		<h2 class="uppercase text-gray-600 text-sm font-semibold border-b border-gray-100 pb-4 mb-4 w-full">Treść</h2>
		<div class="flex flex-col flex-1 border-gray-200 pr-6">
			@if(isset($product) && $product->image)
			<img src="{{ $product->img }}" class="object-cover bg-gray-100 h-64 rounded">
			@endif
			<label for="image" class="text-sm text-gray-500 font-semibold block mt-4">
				Obrazek
				<input type="file" name="image" id="image"
					value="@if($errors->any()){{ old('image') }}@else {{ $product->img ?? null }}@endif"
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
					value="@if($errors->any()){{ old('imageAlt') }}@else{{ $product->imageAlt ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
			</label>
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if (isset($product) && $product->galleryImg)
				@foreach ($product->galleryImg as $gallery)
				<img src="{{ $gallery }}" alt="">
				@endforeach
				@endif
				<label for="gallery" class="text-sm text-gray-500 font-semibold block mt-4">
					Galeria
					<input type="file" name="gallery[]" id="gallery"
						value="@if($errors->any()){{ old('image') }}@else{{ $product->image ?? NULL }}@endif"
						class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
					@error('gallery')
					<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
						{{ $message }}
					</div>
					@enderror
				</label>
			</div>
		</div>
		<div class="flex-1 flex-col pl-6">
			<label for="name" class="text-sm text-gray-500 font-semibold block">
				Nazwa Produktu
				<input type="text" name="name"
					value="@if($errors->any()){{ old('name') }}@else{{ $product->name ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('name')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
			<label for="title" class="text-sm text-gray-500 font-semibold block mt-4">
				Tytuł Wewnętrzny
				<input type="text" name="title"
					value="@if($errors->any()){{ old('title') }}@else{{ $product->title ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('title')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
			<label for="description" class="text-sm text-gray-500 font-semibold block mt-4">
				Opis
				<input type="text" name="description"
					value="@if($errors->any()){{ old('description') }}@else{{ $product->description ?? NULL }}@endif"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
				@error('description')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
			<label for="categoryId" class="text-sm text-gray-500 font-semibold block mt-4">
				Kategoria
				<select name="categoryId" id="categoryId"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
					<option></option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" @if(isset($product) && $category->id === $product->categoryId)
						selected @endif>{{ $category->name }}</option>
					@endforeach
				</select>
				@error('categoryId')
				<div class="bg-red-50 text-red-500 p-2 rounded mt-2">
					{{ $message }}
				</div>
				@enderror
			</label>
			<input type="hidden" name="show" class="hidden" @if(isset($product) && !$product->show) {{ 'checked' }}
			@endif value="0">
			<label for="show" class="flex items-center cursor-pointer mt-4">
				<input type="checkbox" id="show" name="show"
					class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none"
					@if(isset($product) && $product->show) {{ 'checked' }} @endif value="1">
				<p class="text-sm text-gray-500 ml-2 font-light">Aktywny</p>
			</label>
			<input type="hidden" name="avaibility" class="hidden" @if(isset($product) && !$product->avaibility)
			{{ 'checked' }} @endif value="0">
			<label for="avaibility" class="flex items-center cursor-pointer mt-4">
				<input type="checkbox" id="avaibility" name="avaibility"
					class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none"
					@if(isset($product) && $product->avaibility) {{ 'checked' }} @endif value="1">
				<p class="text-sm text-gray-500 ml-2 font-light">Dostępność</p>
			</label>
			<input type="hidden" name="featured" class="hidden" @if(isset($product) && !$product->featured)
			{{ 'checked' }} @endif value="0">
			<label for="featured" class="flex items-center cursor-pointer mt-4">
				<input type="checkbox" id="featured" name="featured"
					class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none"
					@if(isset($product) && $product->featured) {{ 'checked' }} @endif value="1">
				<p class="text-sm text-gray-500 ml-2 font-light">Promowanie</p>
			</label>
			<label for="collections" class="text-sm text-gray-500 font-semibold block mt-4">
				Dostępne kolekcje
				<select name="collections[]" id="collections"
					class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 rounded border border-gray-200"
					multiple>
					@if(isset($collections))
					@foreach($collections as $collection)
					<option value="{{ $collection->id }}" @if(isset($product-> collections))
						@foreach($product->collections as $pcol)
						@if($pcol->id === $collection->id) selected @endif
						@endforeach
						@endif>
						{{ $collection->name }}
					</option>
					@endforeach
					@endif
				</select>
			</label>
		</div>
	</div>
</form>
@if(isset($product))
<form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
	class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
	@csrf
	{{ method_field('DELETE') }}
	<div class="flex-1">
		<h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
		<p class="text-sm text-gray-500">Klikając tę opcję usuniesz produkt oraz wyczyścisz zdjęcia
			przypisane do niego.</p>
	</div>
	<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
		onclick="return confirm('Czy chcesz usunąć tą realizacje?')">Usuń</button>
</form>
@endif
@endsection