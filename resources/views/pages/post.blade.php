@extends('layouts.main')

@section('seo')
<x-seo title="Aktualności - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endsection

@section('content')
@include('components.header')
@include('components.locations', ['crumb' => $post->title])
<div class="container mx-auto mb-16">
    <div class="flex flex-col items-center">
        <img src="{{ $post->photo }}" alt="" class="object-cover w-full max-w-6xl my-12 h-120">
        <div class="w-full max-w-4xl p-12 -mt-40 text-sm leading-7 bg-white text-secondary">
            <span class="text-xs italic text-gray-400">Dodano: {{ $post->created_at->diffForHumans() }}</span>
            <h1 class="mt-2 mb-4 text-3xl font-semibold font-display text-primary">{{ $post->title }}</h1>
            <div class="text-sm leading-7 text-secondary">{!! $post->description !!}</div>
            @if (isset($post->galleryPhotos))
            <div class="grid w-full grid-cols-10 gap-2 mt-4">
                @forelse ($post->galleryPhotos as $photo)
                <a class="col-span-1 splide__slide glightbox3" data-gallery="gallery1" href="{{ $photo }}"><img src="{{ $photo }}"
                        alt="" class="object-cover w-16 h-16 rounded"></a>
                @empty
                @endforelse
            </div>
            @endif
        </div>
    </div>
</div>
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script type="text/javascript">
    const lightbox = GLightbox({
        loop: true,
        selector: '.glightbox3'
    });
</script>
@endsection