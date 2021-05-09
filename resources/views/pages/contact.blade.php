@extends('layouts.main')

@section('title', 'Dowiedz się więcej o naszej firmie')

@section('content')
@include('components.header')
@include('components.locations')
@include('components.successContact')
@include('components.contact')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection