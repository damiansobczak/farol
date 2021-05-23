@extends('layouts.main')

@section('seo')
<x-seo title="Aktualności - Rolety, rolety okienne, Farol Łódź Pabianice i okolice"
    description="Producent rolet Farol Łódź. Zapraszamy do zapoznania się z ofertą firmy FAROL działającej na terenie Łodzi i okolic." />
@endsection

@section('content')
@include('components.header')
@include('components.locations')
<section class="max-w-fluid px-3 mx-auto my-24">
    <div class="container mx-auto">
        <div class="flex items-end justify-between mb-5">
            <div>
                <div class="rounded w-52 h-1 bg-green-500 mb-6"></div>
                <h3 class="font-semibold text-2xl text-primary font-display">Aktualności</h3>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($posts as $post)
            <div class="flex md:flex-col">
                <img src="{{ $post->image ? $post->photo : asset('img/slider-1.png') }}" alt="{{ $post->imageAlt }}"
                    class="h-24 mr-6 md:mr-0 md:h-80 object-cover rounded-tl-3xl rounded-br-3xl w-1/5 md:w-full" />
                <div class="w-4/5 md:mt-5">
                    <h5 class="text-primary font-semibold text-lg font-display">{{ $post->title }}
                    </h5>
                    <p class="text-secondary leading-6 text-sm mt-2">
                        {{ Str::limit($post->description, 160, '...') }}
                    </p>
                    <a href="{{ route('post', $post->slug) }}"
                        class="inline-flex items-center justify-center py-3 text-green-500 text-sm">Przeczytaj więcej
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="ml-2 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection