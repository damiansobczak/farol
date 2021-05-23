@extends('layouts.main')

@section('seo')
<x-seo title="Kontakt - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

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