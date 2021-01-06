@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Kategorie', 'url' => route('admin.categories')], ['name' => 'Formularz kategorii', 'url' => '']]" />
	<form action="@if(isset($category->id)) {{ route('admin.categories.editSave', $category->id) }} @else {{ route('admin.categories.save') }} @endif" method="POST">
		@csrf
		@if(isset($category->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>
		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if(isset($category) && $category->image)
					<img src="{{ $category->image }}" class="object-cover bg-gray-100 h-64 rounded">
				@else
					<div class="object-cover bg-gray-100 h-64 rounded"></div>
				@endif
				<label for="image" class="text-sm text-gray-400 mt-4 block">
					Obrazek
					<input type="file" name="image" id="image" value="@if($errors->any()){{ old('image') }}@else{{ $category->image ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
					Opis obrazka
					<input type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()){{ old('imageAlt') }}@else{{ $category->imageAlt ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
			<div class="flex-1 flex-col pl-6">
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					Nazwa
					<input type="text" name="name" value="@if($errors->any()){{ old('name') }}@else{{ $category->name ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
		</div>
	</form>
@endsection
