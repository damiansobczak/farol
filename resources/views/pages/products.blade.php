@extends('layouts.main')

@section('title', 'Nasze produkty')

@section('content')
@include('components.header')
@include('components.locations')
@include('components.categoryProducts')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection