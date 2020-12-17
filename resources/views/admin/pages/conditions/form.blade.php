@extends('layouts/admin-general')
@section('title', 'Warunki')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Warunki', 'url' => route('admin.conditions')], ['name' => 'Nowy dokument', 'url' => '']]" />
	@if(isset($condition))
		<form action="{{ route('admin.conditions.delete', $condition->id) }}" method="POST" class="flex flex-col" >
			@csrf
			{{ method_field('DELETE') }}
			<div class="flex">
				<button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć ten dokument?')">Usuń</button>
			</div>
		</form>
	@endif
	<form action="@if(isset($condition)) {{ route('admin.conditions.edit', $condition->id) }} @else {{ route('admin.conditions.create') }} @endif" method="POST" enctype="multipart/form-data">
		@csrf
		@if(isset($condition->id))
			{{ method_field('PUT') }} 
		@endif
		<div class="flex">
			<button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
		</div>

		<label for="title" class="text-sm text-gray-400 mt-4 block">
			Tytuł
			<input type="text" name="title" id="title" value="@if($errors->any()) {{ old('title') }} @else {{ $condition->title ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
		</label>
		<label for="content" class="text-sm text-gray-400 mt-4 block">
			Opis
			<input type="text" name="content" id="content" value="@if($errors->any()) {{ old('content') }} @else {{ $condition->content ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
		</label>
	</form>
@endsection
