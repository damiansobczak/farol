@extends('layouts/admin-general')
@section('title', 'Banery')
@section('content')
	<x-breadcrumbs :crumbs="[['name' => 'Banery', 'url' => '']]" />
	@if(session('success'))
		<div class="p-5 bg-green-200 text-green-700 rounded my-3">
			{{ session('success') }}
		</div>
	@endif

	<div class="flex flex-col">
		<a href="{{ route('admin.sliders.create') }}" class="mb-5 ml-auto rounded px-4 py-2 bg-indigo-500 text-white">Utwórz baner</a>
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
								Akcja
							</th>
							<th scope="col" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
								Akcje
							</th>
						</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200">
							@foreach ($sliders as $slider)
								<tr>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="flex-shrink-0 h-10 w-10">
												<img class="h-10 w-10 rounded-full" src="{{ $slider->photo ?? $lider->onlyImage }}" alt="">
											</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="text-sm text-gray-900">{{ $slider->title }}</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
											<span class="px-3 py-1 inline-flex text-xs bg-indigo-500 text-white leading-5 font-semibold rounded-full">
												{{ $slider->actionLink ?? $slider->onlyImageLink ?? 'Brak akcji' }}
											</span>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
										<a href="{{ route('admin.sliders.edit', $slider->id) }}" class="text-indigo-600 hover:text-indigo-800">Edytuj</a>
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
