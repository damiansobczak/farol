@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Kategorie', 'url' => '']]" />
	<a href="{{ route('admin.categories.form') }}">Dodaj +</a>
	<div class="rounded shadow-sm bg-white p-8">
		@foreach($categories as $category)
		@php $counter = 1; @endphp
			<div class="flex flex-column">
				<div>{{ $counter++ }}</div>
				<div>{{ $category->name }}</div>
				<a href="{{ route('admin.categories.form.edit', $category->id) }}">Edytuj</a>
			</div>
		@endforeach
	</div>
@endsection
