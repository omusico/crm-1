
<div class="text-danger wrapper text-center">
    	
	@foreach ($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach

	@if (Session::has('error'))
		<p class="error">{{ Session::get('error') }}</p>
	@endif
</div>
