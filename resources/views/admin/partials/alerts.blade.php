@if(session('success'))
	<div class="p-5 bg-green-200 text-green-700 rounded my-3">
		{{ session('success') }}
	</div>
@endif
@if($errors->any())
	<div class="p-5 bg-red-200 text-red-700 rounded my-3">
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	</div>
@endif