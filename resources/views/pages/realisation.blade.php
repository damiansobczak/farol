@extends('layouts.main')

@section('content')
@include('components.header')
@include('components.locations')
@include('components.realisation')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection