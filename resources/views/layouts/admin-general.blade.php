<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - @yield('title')</title>
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>
<body>
<div class="bg-gray-100 mx-auto w-screen h-screen flex">
    @include('admin/partials/sidebar')
    <div class="flex flex-1 h-full flex-col overflow-y-auto">
        @include('admin/partials/topbar')
        <div class="px-10 py-7">
            @yield('breadcrumbs')
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
