@if ($errors->any())
	<div class="alert alert-danger autoClose">
		@foreach ($errors->all() as $error)
			{{ $error }}<br/>
		@endforeach
	</div>
@endif