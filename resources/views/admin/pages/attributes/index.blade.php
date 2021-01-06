@extends('layouts/admin-general')
@section('title', 'Atrybuty')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Atrybuty', 'url' => '']]" />
	<div class="flex flex-col">
		<a href="{{ route('admin.attributeType.create') }}" class="mb-5 ml-auto rounded px-4 py-2 bg-indigo-500 text-white">Utwórz typ atrybut</a>
		<a href="{{ route('admin.attributes.create') }}" class="mb-5 ml-auto rounded px-4 py-2 bg-indigo-500 text-white">Utwórz atrybut</a>
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
								Nazwa
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Typ atrybutu
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
								Akcje
							</th>
						</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							@foreach($attributes as $attribute)
								<tr>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="flex-shrink-0 h-10 w-10">
												<img class="h-10 w-10 rounded-full" src="{{ $attribute->img }}" alt="{{ $attribute->imageAlt }}">
											</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-sm text-gray-900">{{ $attribute->name }}</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<span class="px-3 py-1 inline-flex text-xs bg-indigo-500 text-white leading-5 font-semibold rounded-full">
											{{ $attribute->attrType->name }}
										</span>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
										<a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="text-indigo-600 hover:text-indigo-800">Edytuj</a>
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
