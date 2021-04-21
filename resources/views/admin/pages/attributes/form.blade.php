@extends('layouts/admin-general')
@section('title', 'Atrybuty')
@section('content')
<x-breadcrumbs
    :crumbs="[['name' => 'Atrybuty', 'url' => route('admin.attributes')], ['name' => 'Formularz atrybutu', 'url' => '']]" />
<form
    action="@if(isset($attribute)) {{ route('admin.attributes.edit', $attribute->id) }} @else {{ route('admin.attributes.create') }} @endif"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($attribute->id))
    {{ method_field('PUT') }}
    @endif
    <div class="flex">
        <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4 ml-auto">Zapisz</button>
    </div>
    <div class="rounded shadow-sm bg-white p-8 flex flex-wrap">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Główne informacje
        </div>
        <div class="flex-1 border-r border-gray-200 pr-6">
            @isset($attribute->photo)
            <img src="{{ $attribute->photo }}" class="object-cover w-full bg-gray-100 h-64 rounded" />
            @endisset
            <label for="image" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Obrazek:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="file" name="image" id="image"
                    value="@if($errors->any()){{ old('image') }}@else {{ $attribute->photo ?? null }} @endif">
            </label>
            <label for="name" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Nazwa:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="name" id="name"
                    value="@if($errors->any()){{ old('name') }}@else {{ $attribute->name ?? null }} @endif">
            </label>
        </div>
    </div>
</form>

@if(isset($attribute))
<form action="{{ route('admin.attributes.delete', $attribute->id) }}" method="POST"
    class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
    @csrf
    {{ method_field('DELETE') }}
    <div class="flex-1">
        <h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
        <p class="text-sm text-gray-500">Klikając tę opcję usuniesz atrybut oraz wyczyścisz zdjęcie
            przypisane do niego.</p>
    </div>
    <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
        onclick="return confirm('Czy chcesz usunąć ten atrybut?')">Usuń</button>
</form>
@endif
@endsection