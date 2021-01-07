@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Kategorie', 'url' => route('admin.categories')], ['name' => 'Formularz kategorii', 'url' => '']]" />
	<div class="rounded shadow-sm bg-white p-8">
		<form action="@if(isset($categoryId)) {{ route('admin.categories.form.editSave', $categoryId) }} @else {{ route('admin.categories.form.save') }} @endif" method="POST">
			@csrf
			<input type="text" name="name" value="@if($errors->any()){{ old('name') }}@else{{ $categoryData->name ?? NULL }}@endif">
			<input type="file" name="image" value="@if($errors->any()){{ old('image') }}@else{{ $categoryData->image ?? NULL }}@endif">
			<input type="text" name="imageAlt" value="@if($errors->any()){{ old('imageAlt') }}@else{{ $categoryData->imageAlt ?? NULL }}@endif">
			<button type="submit">Zapisz</button>
		</form>
	</div>
@endsection
