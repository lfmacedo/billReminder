		<div class="col-md-8 form-inline">
			{!! Form::model(null, ['route' => ['posts.search']]) !!}
			{!! Form::text('query', null, [
				'placeholder' => 'buscar empresa', 
				'class'	=> 'form-control'
				]
			) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			{!! Form::submit('Buscar') !!}
			{!! Form::close() !!}
		</div>

