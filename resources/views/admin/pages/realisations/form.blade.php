@extends('layouts/admin-general')
@section('title', 'Realizacje')
@section('breadcrumbs')
    <div class="mb-5">
        <p class="mb-2 font-medium text-lg">Realizacje</p>
        <ol class="flex flex-row">
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.dashboard') }}">Dashbaord</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.realisations') }}">Realizacje</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="text-gray-400 text-xs">Nowa realizacja</li>
        </ol>
    </div>
@endsection
@section('content')
{{ $errors }}
    @if(session('success'))
        <div class="p-5 bg-green-200 text-green-700 rounded my-3">
            {{ session('success') }}
        </div>
    @endif
    @if(isset($realisation))
    <form action="{{ route('admin.realisations.delete', $realisation->id) }}" method="POST" class="flex flex-col" >
        @csrf
        {{ method_field('DELETE') }}
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć tą realizacje?')">Usuń</button>
        </div>
    </form>
    @endif
    <form action="@if(isset($realisation)) {{ route('admin.realisations.edit', $realisation->id) }} @else {{ route('admin.realisations.create') }} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($realisation->id))
            {{ method_field('PUT') }} 
        @endif
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
        </div>

        <label for="title" class="text-sm text-gray-400 mt-4 block">
            Tytuł
            <input type="text" name="title" id="title" value="@if($errors->any()) {{ old('title') }} @else {{ $realisation->title ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('title')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
            @enderror
        </label>
        <label for="description" class="text-sm text-gray-400 mt-4 block">
            Opis
            <input type="text" name="description" id="description" value="@if($errors->any()) {{ old('description') }} @else {{ $realisation->description ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('description')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
            @enderror
        </label>
        @if (isset($realisation) && $realisation->photo)
            <img src="{{ $realisation->photo }}" width="320" height="240" alt="">
        @endif
        <label for="image" class="text-sm text-gray-400 mt-4 block">
            Obrazek
            <input type="file" name="image" id="image" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('image')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane. Obrazek nie powinien być większy niż 512kB.</div>
            @enderror
        </label>
        <label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
            Opis obrazka
            <input type="text" name="imageAlt" id="imageAlt" value="@if($errors->any()) {{ old('imageAlt') }} @else {{ $realisation->imageAlt ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('imageAlt')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
            @enderror
        </label>
        @if (isset($realisation) && $realisation->movie)
            <video width="320" height="240">
                <source src="{{ $realisation->movie }}" type="video/mp4">
            </video>
        @endif
        <label for="video" class="text-sm text-gray-400 mt-4 block">
            Video
            <input type="file" name="video" id="video" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('video')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">Video nie powinno być większe niż 2048kB (2MB). Dozwolony format mp4</div>
            @enderror
        </label>
        @if (isset($realisation) && $realisation->galleryPhotos)
            @foreach ($realisation->galleryPhotos as $gallery)
                <img src="{{ $gallery }}" alt="">
            @endforeach
        @endif
        <label for="gallery" class="text-sm text-gray-400 mt-4 block">
            Galeria
            <input type="file" name="gallery[]" id="gallery" multiple="multiple" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('gallery')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Zdjęcie nie powinno być większe niż 256kB</div>
            @enderror
        </label>
        <label for="seoTitle" class="text-sm text-gray-400 mt-4 block">
            seoTitle
            <input type="text" name="seoTitle" id="seoTitle" value="@if($errors->any()) {{ old('seoTitle') }} @else {{ $realisation->seoTitle ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('seoTitle')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
            @enderror
        </label>
        <label for="seoDescription" class="text-sm text-gray-400 mt-4 block">
            seoDescription
            <input type="text" name="seoDescription" id="seoDescription" value="@if($errors->any()) {{ old('seoDescription') }} @else {{ $realisation->seoDescription ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('seoDescription')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
            @enderror
        </label>
        <label for="ogTitle" class="text-sm text-gray-400 mt-4 block">
            ogTitle
            <input type="text" name="ogTitle" id="ogTitle" value="@if($errors->any()) {{ old('ogTitle') }} @else {{ $realisation->ogTitle ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('ogTitle')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
            @enderror
        </label>
        <label for="ogDescription" class="text-sm text-gray-400 mt-4 block">
            ogDescription
            <input type="text" name="ogDescription" id="ogDescription" value="@if($errors->any()) {{ old('ogDescription') }} @else {{ $realisation->ogDescription ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('ogDescription')
                <div class="p-2 bg-red-200 text-red-700 rounded my-3">Tekst nie powinien przekraczać 255 znaków.</div>
            @enderror
        </label>
    </form>
@endsection
