@extends('layouts/admin-general')
@section('title', 'Ustawienia')
@section('breadcrumbs')
    <div class="mb-5">
        <p class="mb-2 font-medium text-lg">Aktualności</p>
        <ol class="flex flex-row">
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.dashboard') }}">Dashbaord</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.posts') }}">Aktualności</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="text-gray-400 text-xs">{{ $post->title }}</li>
        </ol>
    </div>
@endsection
@section('content')
    @if(session('success'))
        <div class="p-5 bg-green-200 text-green-700 rounded my-3">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.posts.edit', $post->id) }}" method="POST" class="flex flex-col">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć ten post?')">Usuń</button>
    </form>
    <form action="{{ route('admin.posts.edit', $post->id) }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zaktualizuj</button>
        </div>
        <div class="rounded shadow-sm bg-white p-8 flex">
            <div class="flex-1 border-r border-gray-200 pr-6">
                <img class="object-cover w-full bg-gray-100 h-64 rounded" src="{{ $post->photo ? $post->photo : '' }}">
                <label for="image" class="text-sm text-gray-400 mt-4 block">
                    <p class="mb-2 text-gray-500">Obrazek:</p>
                    <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="file" name="image" id="image" value="{{ $post->photo ? $post->photo : '' }}" >
                    @error('image')
                        <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane. Obrazek nie powinien być większy niż 1MB.</div>
                    @enderror
                </label>
                <label for="imageAlt" class="text-sm text-gray-400 mt-4 block">
                    <p class="mb-2 text-gray-500">Alt:</p>
                    <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="imageAlt" id="imageAlt" value="{{ $post->imageAlt ? $post->imageAlt : '' }}">
                </label>
            </div>
            <div class="flex-1 pl-6">
                <label for="title" class="text-sm text-gray-400 mt-4 block">
                    <p class="mb-2 text-gray-500">Tytuł:</p>
                    <input required class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="title" id="title" placeholder="Tytuł strony" value="{{ $post->title ? $post->title : '' }}" >
                    @error('title')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane</div>
                    @enderror
                </label>
                <label for="description" class="text-sm text-gray-400 my-4 block">
                    <p class="mb-2 text-gray-500">Opis:</p>
                    <textarea required class="h-64 font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="description" value="{{ $post->description ? $post->description : 'Treść' }}" id="description">{{ $post->description ? $post->description : 'Treść' }}</textarea>
                    @error('description')
                        <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane</div>
                    @enderror
                </label>
                <input type="hidden" name="show" class="hidden" value="0">
                <label for="show" class="flex items-center block cursor-pointer mb-3">
                    <input type="checkbox" id="show" name="show" class="font-light form-tick h-5 w-5 border text-xs rounded border-gray-200 rounded-md checked:bg-indigo-600 checked:border-transparent focus:outline-none" value="1" {!!  $post->show === 1 ? 'checked="true"': 'checked="false"' !!}>
                    <p class="text-sm text-gray-500 ml-2 font-light">Aktywny</p>
                </label>
            </div>
        </div>
        <div class="rounded shadow-sm bg-white px-8 pb-8 pt-2 mt-3 flex flex-col">
            <div class="flex items-center justify-between font-medium text-sm text-gray-600 border-b border-gray-200 py-4">
                SEO
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </div>
            <div class="flex">
                <div class="flex-1 border-r border-gray-200 pr-6">
                    <label for="seoTitle" class="text-sm text-gray-400 mt-4 block">
                        <p class="mb-2 text-gray-500">Tytuł:</p>
                        <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="seoTitle" id="seoTitle" value="{{ $post->seo && $post->seo->seoTitle ? $post->seo->seoTitle : '' }}">
                    </label>
                    <label for="seoDescription" class="text-sm text-gray-400 mt-4 block">
                        <p class="mb-2 text-gray-500">Opis:</p>
                        <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="seoDescription" id="seoDescription" value="{{ $post->seo && $post->seo->seoDescription ? $post->seo->seoDescription : '' }}">
                    </label>
                </div>
                <div class="flex-1 pl-6">
                    <label for="ogTitle" class="text-sm text-gray-400 mt-4 block">
                        <p class="mb-2 text-gray-500">Og Title:</p>
                        <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="ogTitle" id="ogTitle" value="{{ $post->seo && $post->seo->ogTitle ? $post->seo->ogTitle : '' }}">
                    </label>
                    <label for="ogDescription" class="text-sm text-gray-400 mt-4 block">
                        <p class="mb-2 text-gray-500">Og Description:</p>
                        <input class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200" type="text" name="ogDescription" id="ogDescription" value="{{ $post->seo && $post->seo->ogDescription ? $post->seo->ogDescription : '' }}">
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection
