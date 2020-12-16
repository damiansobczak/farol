@extends('layouts/admin-general')
@section('title', 'Dashboard')
@section('content')
	<x-breadcrumbs :crumbs="null" />
	<div class="flex w-full mb-5">
		<div class="rounded shadow-sm bg-white flex-1 cursor-pointer">
			<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Ilość produktów</p>
			<span class="text-4xl px-6 leading-5 pb-7 block">456</span>
			<a href="#" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
				Przejdź do produktów
				<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</a>
		</div>
		<div class="rounded shadow-sm bg-white flex-1 cursor-pointer mx-7">
			<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Wartość zamówień</p>
			<span class="text-4xl px-6 leading-5 pb-7 block">1452.62zł</span>
			<a href="#" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
				Przejdź do zamówień
				<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</a>
		</div>
		<div class="rounded shadow-sm bg-white flex-1 cursor-pointer">
			<p class="text-sm text-gray-400 mb-3 px-6 pt-6">Ilość Klientów</p>
			<span class="text-4xl px-6 leading-5 pb-7 block">25</span>
			<a href="#" class="flex items-center bg-gray-50 text-xs text-gray-500 px-6 p-4">
				Przejdź do Klientów
				<svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
				</svg>
			</a>
		</div>
	</div>
	<div class="rounded shadow-sm bg-white p-8">Treść...</div>
@endsection
