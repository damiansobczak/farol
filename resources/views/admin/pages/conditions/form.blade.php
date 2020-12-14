@extends('layouts/admin-general')
@section('title', 'Warunki')
@section('breadcrumbs')
    <div class="mb-5">
        <p class="mb-2 font-medium text-lg">Warunki</p>
        <ol class="flex flex-row">
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.dashboard') }}">Dashbaord</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="flex items-center text-indigo-500 hover:underline">
                <a class="text-xs" href="{{ route('admin.conditions') }}">Warunki</a>
                <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="12" width="12" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </li>
            <li class="text-gray-400 text-xs">Nowy dokument</li>
        </ol>
    </div>
@endsection
@section('content')
    @if(session('success'))
        <div class="p-5 bg-green-200 text-green-700 rounded my-3">
            {{ session('success') }}
        </div>
    @endif
    @if(isset($condition))
    <form action="{{ route('admin.conditions.delete', $condition->id) }}" method="POST" class="flex flex-col" >
        @csrf
        {{ method_field('DELETE') }}
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-red-500 text-white ml-auto mb-4 mr-3" onclick="return confirm('Czy chcesz usunąć ten dokument?')">Usuń</button>
        </div>
    </form>
    @endif
    <form action="@if(isset($condition)) {{ route('admin.conditions.edit', $condition->id) }} @else {{ route('admin.conditions.create') }} @endif" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($condition->id))
            {{ method_field('PUT') }} 
        @endif
        <div class="flex">
            <button type="submit" class="rounded px-4 py-2 bg-indigo-500 text-white mb-4">Zapisz</button>
        </div>

        <label for="title" class="text-sm text-gray-400 mt-4 block">
            Tytuł
            <input type="text" name="title" id="title" value="@if($errors->any()) {{ old('title') }} @else {{ $condition->title ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('title')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
            @enderror
        </label>
        <label for="content" class="text-sm text-gray-400 mt-4 block">
            Opis
            <input type="text" name="content" id="content" value="@if($errors->any()) {{ old('content') }} @else {{ $condition->content ?? NULL }} @endif" class="font-light hover:border-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-300 w-full p-3 rounded border border-gray-200">
            @error('content')
                    <div class="p-2 bg-red-200 text-red-700 rounded my-3">To pole jest wymagane.</div>
            @enderror
        </label>
    </form>
@endsection
