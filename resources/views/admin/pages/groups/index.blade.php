@extends('layouts/admin-general')
@section('title', 'Grupy')
@section('content')
<x-breadcrumbs
    :crumbs="[['name' => 'Grupy', 'url' => route('admin.groups')], ['name' => 'Formularz grup', 'url' => '']]" />
<div class="w-full flex space-x-4">
    <div class="rounded shadow-sm bg-white p-8 flex w-1/2 flex-wrap">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Kolory
        </div>
        @livewire('colors', ['colors' => $colors])
    </div>

    <div class="rounded shadow-sm bg-white p-8 flex w-1/2 flex-wrap">
        <div
            class="flex items-center w-full justify-between font-medium text-sm text-gray-600 border-b border-gray-200 pb-4 mb-4">
            Kolekcje
        </div>
        @livewire('collections', ['collections' => $collections])
    </div>
</div>
@endsection