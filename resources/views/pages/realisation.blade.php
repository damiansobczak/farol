@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endsection

@section('seo')
<x-seo title="Realizacja - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('content')
@include('components.header')
@include('components.locations', ['crumb' => $realisation->title])
@include('components.realisation')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
    new Splide( '.splide', {
	type   : 'loop',
	perPage: 3,
	perMove: 1,
    gap: 24,
    drag: true,
    lazyload: 'sequential',
    breakpoints: {
		780: {
			perPage: 1,
		}
	}
} ).mount();
</script>

<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script type="text/javascript">
    const lightbox = GLightbox({
        loop: true,
        selector: '.glightbox3'
    });
</script>
@endsection