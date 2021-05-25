@extends('layouts.main')

@section('seo')
<x-seo title="Farol - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endsection

@livewireStyles
@section('content')
@include('components.header')
@include('components.locations', ['crumb' => $product->name])
@include('components.aboutProduct')
@if ($product->collections->count())
@include('components.configurator')
@endif
@include('components.footer')
@endsection

@section('scripts')
@livewireScripts
<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script type="text/javascript">
    const lightbox = GLightbox({
        loop: true,
        selector: '.glightbox3'
    });
</script>
@endsection