@extends('layouts/admin-general')
@section('title', 'Realizacje')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Realizacje', 'url' => '']]" />
	@if(session('success'))
		<div class="p-5 bg-green-200 text-green-700 rounded my-3">
			{{ session('success') }}
		</div>
	@endif

	<div class="flex flex-col">
		<a href="{{ route('admin.realisations.create') }}" class="mb-5 ml-auto rounded px-4 py-2 bg-indigo-500 text-white">Dodaj realizacje</a>
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200">
						<thead>
						<tr>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Obrazek
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Tytuł
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Data dodania
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
								Akcje
							</th>
						</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
						@foreach ($realisations as $realisation)
							<tr>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="flex items-center">
										<div class="flex-shrink-0 h-10 w-10">
											<img class="h-10 w-10 rounded-full" src="{{ $realisation->photo }}" alt="">
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">{{ $realisation->title }}</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">{{ $realisation->created_at }}</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
									<a href="{{ route('admin.realisations.edit', $realisation->id) }}" class="text-indigo-600 hover:text-indigo-800">Edytuj</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
