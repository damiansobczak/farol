@extends('layouts/admin-general')
@section('title', 'Banery')
@section('breadcrumbs')
    <div class="mb-5">
        <p class="mb-2 font-medium text-lg">Baner</p>
        <ol class="flex flex-row">
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.dashboard') }}">Dashbaord</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.sliders') }}">Banery</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="text-gray-400 text-xs">Nowy baner</li>
        </ol>
    </div>
@endsection
@section('content')
    @if(session('success'))
        <div class="p-5 bg-green-200 text-green-700 rounded my-3">
            {{ session('success') }}
        </div>
    @endif
    @if(isset($slider))
    <form action="{{ route('admin.sliders.delete', $slider->id) }}" method="POST" class="flex flex-col" >
        @csrf
        {{ method_field('DELETE') }}
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć ten baner?')">Usuń</button>
        </div>
    </form>
    @endif
    <form action="@if(isset($slider)) {{ route('admin.sliders.edit', $slider->id) }} @else {{ route('admin.sliders.create') }} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($slider->id))
            {{ method_field('PUT') }} 
        @endif
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
        </div>

        <div class="flex rounded shadow-sm bg-white p-8">
            <div class="flex flex-col flex-1 border-gray-200 pr-6">
                @if(isset($slider) && $slider->photo)
                    <img src="{{ $slider->photo }}" class="object-cover bg-gray-100 h-64 rounded">
                @else
                    <div class="object-cover bg-gray-100 h-64 rounded"></div>
                @endif
                <label for="image" class="text-sm text-gray-400 mt-4 block">
                    Obrazek
                    <input type="file" name="image" id="image" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                    @error('image')
                            <div class="p-2 bg-red-200 text-red-700 rounded my-3">Obrazek nie powinien być większy niż 512kB.</div>
                    @enderror
                </label>
                <label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
                    Opis obrazka
                    <input type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()) {{ old('imageAlt') }} @else {{ $slider->imageAlt ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
            </div>
            <div class="flex-1 flex-col pl-6">
                <label for="title" class="text-sm text-gray-400 mt-4 block">
                    Tytuł
                    <input type="text" name="title" id="title" value="@if($errors->any()) {{ old('title') }} @else {{ $slider->title ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
                <label for="description" class="text-sm text-gray-400 mt-4 block">
                    Opis
                    <input type="text" name="description" id="description" value="@if($errors->any()) {{ old('description') }} @else {{ $slider->description ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
                <label for="actionName" class="text-sm text-gray-400 mt-4 block">
                    Tekst na przycisku
                    <input type="text" name="actionName" id="actionName" value="@if($errors->any()) {{ old('actionName') }} @else {{ $slider->actionName ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
                <label for="actionLink" class="text-sm text-gray-400 mt-4 block">
                    Link przycisku
                    <input type="text" name="actionLink" id="actionLink" value="@if($errors->any()) {{ old('actionLink') }} @else {{ $slider->actionLink ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
            </div>
        </div>

        <div class="rounded shadow-sm bg-white px-8 pb-8 pt-2 mt-3 flex flex-col">
            <div class="flex items-center justify-between font-medium text-sm text-gray-600 border-b border-gray-200 py-4">
                Obrazek jako slider
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </div>
            <div class="flex mt-2">
                <div class="flex flex-col flex-1 mr-5">
                    @if(isset($slider) && $slider->onlyPhoto)
                    <img src="{{ $slider->onlyPhoto }}" class="object-cover bg-gray-100 h-64 rounded">
                    @else
                        <div class="object-cover bg-gray-100 h-64 rounded"></div>
                    @endif
                    <label for="onlyImage" class="flex-1 pr-5 text-sm text-gray-400 mt-4 block">
                        Obrazek
                        <input type="file" type="text" name="onlyImage" id="onlyImage" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                        @error('onlyImage')
                                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Obrazek nie powinien być większy niż 512kB.</div>
                        @enderror
                    </label>
                </div>
                <label for="onlyImageLink" class="flex-1 text-sm text-gray-400 mt-4 block">
                    Link
                    <input type="text" name="onlyImageLink" id="onlyImageLink" value="@if($errors->any()) {{ old('onlyImageLink') }} @else {{ $slider->onlyImageLink ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
                </label>
            </div>
        </div>
    </form>
@endsection
