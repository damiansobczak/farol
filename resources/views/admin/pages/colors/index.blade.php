@extends('layouts/admin-general')
@section('title', 'Ustawienia')
@section('content')
<x-breadcrumbs :crumbs="[['name' => 'Spis kolorów', 'url' => '']]" />
@livewire('colors', ['colors' => $colors])
@endsection