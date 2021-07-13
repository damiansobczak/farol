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
    <div class="flex w-screen h-screen mx-auto bg-gray-100">
        @include('admin/partials/sidebar')
        <div class="flex flex-col flex-1 h-full overflow-y-auto">
            @include('admin/partials/topbar')
            <div class="px-10 py-7">
                @include('admin.partials.alerts')
                @yield('content')
            </div>
        </div>
    </div>
    @livewireScripts
    @yield('scripts')
</body>

</html>