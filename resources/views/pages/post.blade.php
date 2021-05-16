@extends('layouts.main')

@section('content')
@include('components.header')
@include('components.locations')
<div class="container mx-auto mb-16">
    <div class="flex flex-col items-center">
        <img src="{{ $post->image }}" alt="" class="object-cover h-120 my-12 w-full max-w-6xl">
        <div class="w-full max-w-4xl p-12 -mt-40 bg-white">
            <span class="text-xs text-gray-400 italic">Dodano: {{ $post->created_at->diffForHumans() }}</span>
            <h1 class="font-display text-3xl font-semibold mb-4 text-primary mt-2">{{ $post->title }}</h1>
            <p class="text-secondary text-sm leading-7">{{ $post->description }}</p>
        </div>
    </div>
</div>
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
@endsection