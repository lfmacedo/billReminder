<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
	{!! Form::label('nome', 'Nome*:') !!}
	{!! Form::text('nome', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nome')) <p class="autoClose alert alert-danger">{{ $errors->first('nome') }}</p> @endif
</div>

<div class="form-group">
	{!! Form::label('cnpj', 'CNPJ*:') !!}
	{!! Form::text('cnpj', null, ['class' => 'form-control cnpj']) !!}
	@if ($errors->has('cnpj')) <p class="autoClose alert alert-danger">{{ $errors->first('cnpj') }}</p> @endif
</div>

<div class="form-group">
	{!! Form::label('telefone', 'Telefone:') !!}
	{!! Form::text('telefone', null, ['class' => 'form-control phone']) !!}
	@if ($errors->has('telefone')) <p class="autoClose alert alert-danger">{{ $errors->first('telefone') }}</p> @endif
</div>

<div class="form-group">
	{!! Form::label('email', 'E-mail:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	@if ($errors->has('email')) <p class="autoClose alert alert-danger">{{ $errors->first('email') }}</p> @endif
</div>

<div class="btn-group" role="group" aria-label="...">
	{!! Form::button('Voltar', array('class' => 'btn btn-default', 'onclick' => 'window.history.back()')) !!}
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
</div>