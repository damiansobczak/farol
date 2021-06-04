@extends('layouts/admin-general')
@section('title', 'Materiały')
@section('content')
<x-breadcrumbs
    :crumbs="[['name' => 'Materiały', 'url' => route('admin.materials')], ['name' => 'Formularz materiału', 'url' => '']]" />
<form
    action="@if(isset($material)) {{ route('admin.materials.edit', $material->id) }} @else {{ route('admin.materials.create') }} @endif"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($material->id))
    {{ method_field('PUT') }}
    @endif
    <div class="flex">
        <button type="submit" class="px-4 py-2 mb-4 ml-auto text-white bg-indigo-500 rounded">Zapisz</button>
    </div>
    <div class="flex flex-wrap p-8 bg-white rounded shadow-sm">
        <div
            class="flex items-center justify-between w-full pb-4 mb-4 text-sm font-medium text-gray-600 border-b border-gray-200">
            Główne informacje
        </div>
        <div class="flex-1 pr-6 border-r border-gray-200">
            @isset($material->photo)
            <img src="{{ $material->photo }}" class="object-cover w-full h-64 mb-4 bg-gray-100 rounded" />
            @endisset
            <label for="image" class="block text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Obrazek:</p>
                <input
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
                    type="file" name="image" id="image">
            </label>
            <label for="imageAlt" class="block mt-4 text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Alt:</p>
                <input
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
                    type="text" name="imageAlt" id="imageAlt"
                    value="@if($errors->any()){{ old('imageAlt') }}@else{{ $material->imageAlt ?? NULL }}@endif">
            </label>
        </div>
        <div class="flex-1 pl-6">
            <label for="name" class="block text-sm font-semibold text-gray-500">
                <p class="mb-2 text-gray-500">Nazwa:</p>
                <input required
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
                    type="text" name="name" id="name" placeholder="Nazwa materiału"
                    value="@if($errors->any()){{ old('name') }}@else{{ $material->name ?? NULL }}@endif">
            </label>
            <label for="code" class="block mt-4 text-sm font-semibold text-gray-500"">
				<p class="mb-2 text-gray-500 ">Kod:</p>
                <input
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4"
                    type="text" name="code" id="code"
                    value="@if($errors->any()){{ old('code') }}@else{{ $material->code ?? NULL }}@endif">
            </label>
        </div>
    </div>

    <div class="flex flex-wrap p-8 my-8 bg-white rounded shadow-sm">
        <div
            class="flex items-center justify-between w-full pb-4 mb-4 text-sm font-medium text-gray-600 border-b border-gray-200">
            Grupy
        </div>
        <div class="flex w-full space-x-4 border-gray-200">
            <label for="color_id" class="w-1/2 text-sm font-semibold text-gray-500">
                <p class="mb-2 text-gray-500 ">Kolor:</p>
                <select name="color_id" id="color_id"
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4">
                    <option value="">Wybierz...</option>
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}" @if (isset($material) && isset($material->color) &&
                        $material->color->id ===
                        $color->id)
                        selected
                        @endif >
                        {{ $color->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="collection_id" class="w-1/2 text-sm font-semibold text-gray-500">
                <p class="mb-2 text-gray-500 ">Kolekcja:</p>
                <select name="collection_id" id="collection_id""
                    class="w-full h-10 p-2 mt-2 font-light text-gray-400 placeholder-gray-300 border border-gray-200 rounded outline-none appearance-none  hover:border-indigo-200 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4">
                    <option value="">Wybierz...</option>
                    @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}" @if (isset($material) && isset($material->collection) &&
                        $material->collection->id ===
                        $collection->id)
                        selected
                        @endif >
                        {{ $collection->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    </div>

    <div class="flex flex-wrap p-8 my-8 bg-white rounded shadow-sm">
        <div
            class="flex items-center justify-between w-full pb-4 mb-4 text-sm font-medium text-gray-600 border-b border-gray-200">
            Atrybuty
        </div>
        <div class="grid w-full grid-cols-3 gap-4">
            @foreach ($attributes as $attribute)
            <label for="{{ $attribute->id }}" class="flex items-center w-1/3 cursor-pointer">
                <input type="checkbox" id="{{ $attribute->id }}" name="attributes[]"
                    class="w-5 h-5 border border-gray-300 rounded outline-none appearance-none checked:bg-indigo-500"
                    value="{{ $attribute->id }}" @if (isset($material) && $material->hasAttribute($attribute->id))
                checked
                @endif/>
                <p class="ml-2 text-sm font-light text-gray-500 whitespace-nowrap">{{ $attribute->name }}</p>
            </label>
            @endforeach
        </div>
    </div>
</form>

@if(isset($material))
<form action="{{ route('admin.materials.delete', $material->id) }}" method="POST"
    class="flex items-center justify-between w-full p-8 mt-8 bg-white rounded shadow-sm">
    @csrf
    {{ method_field('DELETE') }}
    <div class="flex-1">
        <h3 class="text-lg font-semibold text-gray-700">Uwaga!</h3>
        <p class="text-sm text-gray-500">Klikając tę opcję usuniesz materiał oraz wyczyścisz zdjęcia
            przypisane do niego.</p>
    </div>
    <button type="submit" class="px-4 py-2 mb-4 ml-auto mr-3 text-white bg-red-500 rounded"
        onclick="return confirm('Czy chcesz usunąć ten materiał?')">Usuń</button>
</form>
@endif
@endsection