@extends('layouts.main')

@section('styles')
@livewireScripts
@endsection

@section('Strona Główna')

@section('content')
@include('components.header')
@include('components.slider')
@include('components.assets')
@include('components.about')
@include('components.popularProducts')
@include('components.news')
@include('components.footer')
@endsection

@section('scripts')
@livewireScripts
<script src="{{ asset('js/app.js') }}"></script>
@endsection