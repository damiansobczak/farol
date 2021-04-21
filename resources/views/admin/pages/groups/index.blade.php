@extends('layouts/admin-general')
@section('title', 'Materiały')
@section('content')
<x-breadcrumbs
    :crumbs="[['name' => 'Materiały', 'url' => route('admin.materials')], ['name' => 'Formularz materiału', 'url' => '']]" />
@livewire('groups', ['colors' => $colors, 'collections' => $collections])
@endsection