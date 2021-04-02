<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - @yield('title')</title>
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body>
    <div class="bg-gray-100 mx-auto w-screen h-screen">
        @yield('content')
    </div>
    @livewireScripts

</body>

</html>