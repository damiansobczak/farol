@extends('layouts/admin-general')
@section('title', 'Atrybuty')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Atrybuty', 'url' => route('admin.attributes')], ['name' => 'Formularz atrybutu', 'url' => '']]" />
	<form action="@if(isset($attribute)) {{ route('admin.attributes.editSave', $attribute->id) }} @else {{ route('admin.attributes.save') }} @endif" method="POST" enctype="multipart/form-data">
		@csrf
		@if(isset($attribute->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>

		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex flex-col flex-1 border-gray-200 pr-6">
				@if(isset($attribute) && $attribute->image)
					<img src="{{ $attribute->image }}" class="object-cover bg-gray-100 h-64 rounded">
				@else
					<div class="object-cover bg-gray-100 h-64 rounded"></div>
				@endif
				<label for="image" class="text-sm text-gray-400 mt-4 block">
					Obrazek
					<input type="file" name="image" id="image" value="@if($errors->any()) {{ old('image') }} @else {{ $attribute->image ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
					Opis obrazka
					<input type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()) {{ old('imageAlt') }} @else {{ $attribute->imageAlt ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
			<div class="flex-1 flex-col pl-6">
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					Nazwa
					<input type="text" name="name" id="name" value="@if($errors->any()) {{ old('name') }} @else {{ $attribute->name ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="attributeType" class="text-sm text-gray-400 mt-4 block">
					Typ atrybutu
					<select name="attributeType" id="attributeType">
						<option></option>
						@foreach($attributeTypes as $attrType)
							<option value="{{ $attrType->id }}" @if(isset($attribute) && $attrType->id === $attribute->attributeType) selected @endif>{{ $attrType->name }}</option>
						@endforeach
					</select>
				</label>
				<label for="minValue" class="text-sm text-gray-400 mt-4 block">
					Minimalna wartość
					<input type="text" name="minValue" id="minValue" value="@if($errors->any()) {{ old('minValue') }} @else {{ $attribute->minValue ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="maxValue" class="text-sm text-gray-400 mt-4 block">
					Maksymalna wartość
					<input type="text" name="maxValue" id="maxValue" value="@if($errors->any()) {{ old('maxValue') }} @else {{ $attribute->maxValue ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
			</div>
		</div>
	</form>
@endsection
