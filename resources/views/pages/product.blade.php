@extends('layouts.main')

@livewireStyles
@section('content')
@include('components.header')
@include('components.locations')
@include('components.aboutProduct')
@if ($product->collections->count())
@include('components.configurator')
@endif
@include('components.footer')
@endsection

@section('scripts')
@livewireScripts
<script src="{{ asset('js/header.js') }}"></script>
@endsection