@extends('layouts.main')

@livewireStyles
@section('content')
@include('components.header')
@include('components.locations')
@include('components.aboutProduct')
@include('components.configurator')
@include('components.footer')
@endsection

@section('scripts')
@livewireScripts
<script src="{{ asset('js/header.js') }}"></script>
@endsection