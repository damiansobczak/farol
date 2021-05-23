@extends('layouts.main')

@section('seo')
<x-seo title="Aktualności - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

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