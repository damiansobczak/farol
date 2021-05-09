@if(session('message'))
<div class="container mx-auto">
    <div class="p-5 bg-green-100 text-green-700 rounded my-3">
        {{ session('message') }}
    </div>
</div>
@endif