@extends('layouts.main')

@section('content')
@include('components.header')
@include('components.locations')
@include('components.customer.widgets')
@include('components.customer.orders')
@include('components.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/header.js') }}"></script>
<script src="{{ asset('js/order.js') }}"></script>
@endsection