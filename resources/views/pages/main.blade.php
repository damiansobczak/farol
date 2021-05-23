@extends('layouts.main')

@section('seo')
<x-seo title="Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('styles')
@livewireScripts
@endsection

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