<div class="container mx-auto flex flex-wrap">
    @include('components.summary')
    @livewire('controls', ['product' => $product])
</div>