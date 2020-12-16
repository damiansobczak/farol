@extends('layouts/admin-general')
@section('title', 'Ustawienia')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Ustawienia ogólne', 'url' => '']]" />
	<div class="rounded shadow-sm bg-white p-8">
		<form action="#" method="POST">
			<div class="flex mb-2">
				<p class="uppercase text-gray-400 text-xs tracking-wider w-2/6">Ogólne ustawienia sklepu</p>
				<div class="w-3/6">
					<div class="pb-6">
						<p class="text-sm text-gray-700 mb-2">Tryb ten wyłączy możliwości składania zamówień oraz system płatności. Używaj go w sytuacji konieczności zmiany cen lub promocji.</p>
						<label for="maintenance" class="flex items-center block cursor-pointer mb-3">
							<input type="checkbox" id="maintenance" name="maintenance" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none">
							<p class="text-sm text-gray-500 ml-2 font-light">Tryb konserwacji</p>
						</label>
					</div>
					<div>
						<p class="text-sm text-gray-700 mb-2">Zaznaczenie tej opcji wyłączy sklep całkowicie. Użytkownicy nie będą mogli wejść na stronę.</p>
						<label for="disable" class="flex items-center block cursor-pointer mb-3">
							<input type="checkbox" id="disable" name="disable" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none">
							<p class="text-sm text-gray-500 ml-2 font-light">Wyłącz sklep</p>
						</label>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection