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
        <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4 ml-auto">Zapisz</button>
    </div>
    <div class="rounded shadow-sm bg-white p-8 flex flex-wrap">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Główne informacje
        </div>
        <div class="flex-1 border-r border-gray-200 pr-6">
            @isset($material->photo)
            <img src="{{ $material->photo }}" class="object-cover w-full bg-gray-100 h-64 rounded" />
            @endisset
            <label for="image" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Obrazek:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="file" name="image" id="image">
            </label>
            <label for="imageAlt" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Alt:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="imageAlt" id="imageAlt"
                    value="@if($errors->any()){{ old('imageAlt') }}@else{{ $material->imageAlt ?? NULL }}@endif">
            </label>
        </div>
        <div class="flex-1 pl-6">
            <label for="name" class="text-sm text-gray-500 font-semibold block">
                <p class="mb-2 text-gray-500">Nazwa:</p>
                <input required
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="name" id="name" placeholder="Tytuł strony"
                    value="@if($errors->any()){{ old('name') }}@else{{ $material->name ?? NULL }}@endif">
            </label>
            <label for="code" class="text-sm text-gray-500 font-semibold block mt-4"">
				<p class=" mb-2 text-gray-500">Kod:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="code" id="code" value="@if($errors->any()){{ old('code') }}@endif">
            </label>
        </div>
    </div>

    <div class="rounded shadow-sm bg-white p-8 flex flex-wrap my-8">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Grupy
        </div>
        <div class="w-full flex space-x-4 border-gray-200">
            <label for="color_id" class="text-sm text-gray-500 font-semibold w-1/2">
                <p class=" mb-2 text-gray-500">Kolor:</p>
                <select name="color_id" id="color_id"
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200">
                    <option value="">Wybierz...</option>
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}" @if (isset($material) && $material->color->id === $color->id)
                        selected
                        @endif>{{ $color->name }}</option>
                    @endforeach
                </select>
            </label>
            <label for="collection_id" class="text-sm text-gray-500 font-semibold w-1/2">
                <p class=" mb-2 text-gray-500">Kolekcja:</p>
                <select name="collection_id" id="collection_id""
                    class=" outline-none appearance-none text-gray-400 font-light hover:border-indigo-200
                    placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4
                    mt-2 w-full p-2 h-10 rounded border border-gray-200">
                    <option value="">Wybierz...</option>
                    @foreach ($collections as $collection)
                    <option value="{{ $collection->id }}" @if (isset($material) && $material->collection->id ===
                        $collection->id)
                        selected
                        @endif >
                        {{ $collection->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    </div>

    <div class="rounded shadow-sm bg-white p-8 flex flex-wrap my-8">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Materiał
        </div>
        <div class="w-full flex space-x-4 border-gray-200">
            <label for="transmission" class="text-sm text-gray-500 font-semibold w-1/3">
                <p class=" mb-2 text-gray-500">Transmisja:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="transmission" id="transmission"
                    value="@if($errors->any()){{ old('transmission') }}@endif">
            </label>
            <label for="absorption" class="text-sm text-gray-500 font-semibold w-1/3">
                <p class=" mb-2 text-gray-500">Absorpcja:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="absorption" id="absorption"
                    value="@if($errors->any()){{ old('absorption') }}@endif">
            </label>
            <label for="reflection" class="text-sm text-gray-500 font-semibold w-1/3">
                <p class=" mb-2 text-gray-500">Refleksja:</p>
                <input
                    class="outline-none appearance-none text-gray-400 font-light hover:border-indigo-200 placeholder-gray-300 focus:text-gray-700 focus:border-indigo-600 focus:ring-indigo-100 focus:ring-4 mt-2 w-full p-2 h-10 rounded border border-gray-200"
                    type="text" name="reflection" id="reflection"
                    value="@if($errors->any()){{ old('reflection') }}@endif">
            </label>
        </div>
    </div>

    <div class="rounded shadow-sm bg-white p-8 flex flex-wrap my-8">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Atrybuty
        </div>
        <div class="w-full grid grid-cols-3 gap-4">
            @foreach ($attributes as $attribute)
            <label for="{{ $attribute->id }}" class="flex items-center cursor-pointer w-1/3">
                <input type="checkbox" id="{{ $attribute->id }}" name="attributes[]"
                    class="h-5 w-5 border border-gray-300 rounded checked:bg-indigo-500 appearance-none outline-none"
                    value="{{ $attribute->id }}" @if (isset($material) && $material->hasAttribute($attribute->id))
                checked
                @endif/>
                <p class="text-sm text-gray-500 ml-2 font-light whitespace-nowrap">{{ $attribute->name }}</p>
            </label>
            @endforeach
        </div>
    </div>
</form>

@if(isset($material))
<form action="{{ route('admin.materials.delete', $material->id) }}" method="POST"
    class="flex rounded shadow-sm bg-white p-8 mt-8 w-full items-center justify-between">
    @csrf
    {{ method_field('DELETE') }}
    <div class="flex-1">
        <h3 class="text-lg text-gray-700 font-semibold">Uwaga!</h3>
        <p class="text-sm text-gray-500">Klikając tę opcję usuniesz materiał oraz wyczyścisz zdjęcia
            przypisane do niego.</p>
    </div>
    <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3"
        onclick="return confirm('Czy chcesz usunąć ten materiał?')">Usuń</button>
</form>
@endif
@endsection