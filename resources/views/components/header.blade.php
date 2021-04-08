<div class="max-w-fluid px-3 mx-auto">
    @include('components.topbar')
    @include('components.menu', ['categories' => App\Http\Controllers\MainPageController::categories()])
</div>