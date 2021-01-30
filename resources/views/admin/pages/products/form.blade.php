@extends('layouts/admin-general')
@section('title', 'Produkty')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Produkty', 'url' => route('admin.products')], ['name' => 'Formularz produktu', 'url' => '']]" />
	<form action="@if(isset($product->id)) {{ route('admin.products.editSave', $product->id) }} @else {{ route('admin.products.save') }} @endif" method="POST" enctype="multipart/form-data">
		@csrf
		@if(isset($product->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>
		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if(isset($product) && $product->image)
					<img src="{{ $product->img }}" class="object-cover bg-gray-100 h-64 rounded">
				@else
					<div class="object-cover bg-gray-100 h-64 rounded"></div>
				@endif
				<label for="image" class="text-sm text-gray-400 mt-4 block">
					Obrazek
					<input type="file" name="image" id="image" value="@if($errors->any()){{ old('image') }}@else{{ $product->image ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
					Opis obrazka
					<input type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()){{ old('imageAlt') }}@else{{ $product->imageAlt ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
			<div class="flex-1 flex-col pl-6">
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					Nazwa
					<input type="text" name="name" value="@if($errors->any()){{ old('name') }}@else{{ $product->name ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="description" class="text-sm text-gray-400 mt-4 block">
					Opis
					<input type="text" name="description" value="@if($errors->any()){{ old('description') }}@else{{ $product->description ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="categoryId" class="text-sm text-gray-400 mt-4 block">
					Kategoria
					<select name="categoryId" id="categoryId" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
						<option></option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" @if(isset($product) && $category->id === $product->categoryId) selected @endif>{{ $category->name }}</option>
						@endforeach
					</select>
				</label>
				<label for="attributeTypes" class="text-sm text-gray-400 mt-4 block">
					Atrybuty produktu
					<select name="attributeTypes[]" id="attributeTypes" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" multiple>
						@foreach($attributeType as $aType)
							<option value="{{ $aType->id }}" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full" @if(isset($product) && $aType->id === $product->categoryId) selected @endif>{{ $aType->name }}</option>
						@endforeach
					</select>
				</label>
				<input type="hidden" name="show" class="hidden" @if(isset($product) && !$product->show) {{ 'checked' }} @endif value="0">
				<label for="show" class="flex items-center block cursor-pointer mb-3">
					<input type="checkbox" id="show" name="show" class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" @if(isset($product) && $product->show) {{ 'checked' }} @endif value="1">
					<p class="text-sm text-gray-500 ml-2 font-light">Aktywny</p>
				</label>
				<input type="hidden" name="avaibility" class="hidden" @if(isset($product) && !$product->avaibility) {{ 'checked' }} @endif value="0">
				<label for="avaibility" class="flex items-center block cursor-pointer mb-3">
					<input type="checkbox" id="avaibility" name="avaibility" class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" @if(isset($product) && $product->avaibility) {{ 'checked' }} @endif value="1">
					<p class="text-sm text-gray-500 ml-2 font-light">Dostępność</p>
				</label>
				<input type="hidden" name="featured" class="hidden" @if(isset($product) && !$product->featured) {{ 'checked' }} @endif value="0">
				<label for="featured" class="flex items-center block cursor-pointer mb-3">
					<input type="checkbox" id="featured" name="featured" class="h-6 w-6 border border-gray-300 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" @if(isset($product) && $product->featured) {{ 'checked' }} @endif value="1">
					<p class="text-sm text-gray-500 ml-2 font-light">Promowanie</p>
				</label>

			</div>
		</div>
		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if(isset($product) && $product->priceList)
					<div class="object-cover bg-gray-100 h-64 rounded"></div>
				@else
					<div class="object-cover bg-gray-100 h-64 rounded"></div>
				@endif
				<label for="priceList" class="text-sm text-gray-400 mt-4 block">
					Cennik produktu
					<input type="file" name="priceList" id="priceList" value="@if($errors->any()){{ old('priceList') }}@else{{ $product->priceList ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
		</div>
		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if (isset($product) && $product->galleryImg)
					@foreach ($product->galleryImg as $gallery)
						<img src="{{ $gallery }}" alt="">
					@endforeach
				@endif
				<label for="gallery" class="text-sm text-gray-400 mt-4 block">
					Galeria
					<input type="file" name="gallery[]" id="gallery" value="@if($errors->any()){{ old('image') }}@else{{ $product->image ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
			<div class="flex-1 flex-col pl-6">
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					seoTitle
					<input type="text" name="seoTitle" value="@if($errors->any()){{ old('seoTitle') }}@else{{ $product->seoTitle ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					seoDescription
					<input type="text" name="seoDescription" value="@if($errors->any()){{ old('seoDescription') }}@else{{ $product->seoDescription ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					ogTitle
					<input type="text" name="ogTitle" value="@if($errors->any()){{ old('ogTitle') }}@else{{ $product->ogTitle ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					ogDesc
					<input type="text" name="ogDesc" value="@if($errors->any()){{ old('ogDesc') }}@else{{ $product->ogDesc ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
		</div>
	</form>
@endsection
