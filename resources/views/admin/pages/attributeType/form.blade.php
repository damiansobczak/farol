@extends('layouts/admin-general')
@section('title', 'Typy atrybutów')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Atrybuty', 'url' => route('admin.attributes')], ['name' => 'Formularz typu atrybutu', 'url' => '']]" />
	<form action="@if(isset($attribute)) {{ route('admin.sliders.edit', $attribute->id) }} @else {{ route('admin.attributeType.save') }} @endif" method="POST">
		@csrf
		@if(isset($attribute->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>

		<div class="flex rounded shadow-sm bg-white p-8">
			<div class="flex-1 flex-col pl-6">
				<label for="name" class="text-sm text-gray-400 mt-4 block">
					Nazwa
					<input type="text" name="name" id="name" value="@if($errors->any()){{ old('name') }}@else{{ $attribute->name ?? NULL }}@endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="attributeType" class="text-sm text-gray-400 mt-4 block">
					Czy atrybut jest wymiarem?
					<input type="checkbox" id="isDimension" name="isDimension" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" value="1">
				</label>
			</div>
		</div>
	</form>
@endsection
