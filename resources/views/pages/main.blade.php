@extends('layouts.main')

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