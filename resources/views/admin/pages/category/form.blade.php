@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Kategorie', 'url' => route('admin.categories')], ['name' => 'Formularz kategorii', 'url' => '']]" />
	@if($errors->any())
		<div>
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<div class="rounded shadow-sm bg-white p-8">
		<form action="@if(isset($categoryId)) {{ route('admin.categories.form.editSave', $categoryId) }} @else {{ route('admin.categories.form.save') }} @endif" method="POST">
			@csrf
			<input type="text" name="name" value="{{ $categoryData ? $categoryData->name : NULL }} @if($errors->any()) {{ old('name') }} @endif">
			<input type="file" name="image" value="{{ $categoryData ? $categoryData->image : NULL }} @if($errors->any()) {{ old('image') }} @endif">
			<input type="text" name="imageAlt" value="{{ $categoryData ? $categoryData->imageAlt : NULL }} @if($errors->any()) {{ old('imageAlt') }} @endif">
			<button type="submit">Zapisz</button>
		</form>
	</div>
@endsection
