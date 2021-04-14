@extends('layouts/admin-general')
@section('title', 'Dashboard')
@section('content')
<x-breadcrumbs :crumbs="null" />
<div class="flex w-full mb-5">
	<div class="rounded shadow-sm bg-white flex-1 cursor-pointer">
		<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Ilość produktów</p>
		<span class="text-4xl px-6 leading-5 pb-7 block">{{ $products->count() }}</span>
		<a href="{{ route('admin.products') }}" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
			Przejdź do produktów
			<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
			</svg>
		</a>
	</div>
	<div class="rounded shadow-sm bg-white flex-1 cursor-pointer mx-7">
		<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Ilość kategorii</p>
		<span class="text-4xl px-6 leading-5 pb-7 block">{{ $categories->count() }}</span>
		<a href="{{ route('admin.categories') }}" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
			Przejdź do kategorii
			<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
			</svg>
		</a>
	</div>
	<div class="rounded shadow-sm bg-white flex-1 cursor-pointer">
		<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Ilość materiałów</p>
		<span class="text-4xl px-6 leading-5 pb-7 block">{{ $materials->count() }}</span>
		<a href="{{ route('admin.materials') }}" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
			Przejdź do materiałów
			<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
			</svg>
		</a>
	</div>
</div>
@endsection