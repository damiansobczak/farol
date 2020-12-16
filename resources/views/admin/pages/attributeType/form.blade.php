@extends('layouts/admin-general')
@section('title', 'Typy atrybutów')
@section('breadcrumbs')
	<div class="mb-5">
		<p class="mb-2 font-medium text-lg">Typy atrybutów</p>
		<ol class="flex flex-row">
			<li class="flex items-center text-indigo-500 hover:underline">
				<a class="text-xs" href="{{ route('admin.dashboard') }}">Dashbaord</a>
				<svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</li>
			<li class="flex items-center text-indigo-500 hover:underline">
				<a class="text-xs" href="{{ route('admin.attributes') }}">Atrybuty</a>
				<svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</li>
			<li class="text-gray-400 text-xs">Formularz typu atrybutu</li>
		</ol>
	</div>
@endsection
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Atrybuty', 'url' => route('admin.attributes')], ['name' => 'Formularz typu atrybutu', 'url' => '']]" />
	@if(session('success'))
		<div class="p-5 bg-green-200 text-green-700 rounded my-3">
			{{ session('success') }}
		</div>
	@endif
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
					<input type="text" name="name" id="name" value="@if($errors->any()) {{ old('name') }} @else {{ $attribute->name ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
				</label>
				<label for="attributeType" class="text-sm text-gray-400 mt-4 block">
					Czy atrybut jest wymiarem?
					<input type="checkbox" id="isDimension" name="isDimension" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" value="1">
				</label>
			</div>
		</div>
	</form>
@endsection
