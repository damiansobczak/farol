@extends('layouts.main')

@section('seo')
<x-seo title="O firmie - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('content')
@include('components.header')
@include('components.locations', ['crumb' => 'O firmie'])
@include('components.about')
@include('components.jumbo')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection