@extends('layouts/admin-general')
@section('title', 'Kategorie')
@section('breadcrumbs')
	<div class="mb-5">
		<p class="mb-2 font-medium text-lg">Kategorie</p>
		<ol class="flex flex-row">
			<li class="flex items-center text-indigo-500 hover:underline">
				<a class="text-xs" href="{{ route('admin.dashboard') }}">Dashboard</a>
				<svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</li>
			<li class="text-gray-400 text-xs">Kategorie</li>
			<li class="text-gray-400 text-xs">Formularz kategorii</li>
		</ol>
	</div>

@endsection
@section('content')
	@if($errors->any())
		<div>
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<div class="rounded shadow-sm bg-white p-8">
		<form action="{{ route('admin.categories.form.save') }}" method="POST">
			@csrf
			<input type="text" name="name">
			<input type="file" name="image">
			<input type="text" name="imageAlt">
			<button type="submit">Zapisz</button>
		</form>
	</div>
@endsection