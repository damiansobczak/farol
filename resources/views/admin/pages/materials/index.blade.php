@extends('layouts/admin-general')
@section('title', 'Materiały')
@section('content')
<x-breadcrumbs :crumbs="[['name' => 'Spis materiałów', 'url' => '']]" />
<div class="flex flex-col">
    @livewire('materials', ['collections' => $collections, 'colors' => $colors, 'materials' => $materials])
</div>
@endsection