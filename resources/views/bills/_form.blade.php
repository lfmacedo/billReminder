<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
	
	{!! Form::label('payment_date', 'Data do Pagamento*:', ['class' => 'col-sm-2 control-label']) !!}
	{!! Form::text('payment_date', null, ['class' => 'form-control readonly datepicker', 'data-mask' => '00/00/0000', 'placeholder' => 'abrir calendário']) !!}
			
	@if ($errors->has('payment_date')) <p class="autoClose alert alert-danger">{{ $errors->first('payment_date') }}</p> @endif
	
</div>

<div class="form-group">
	{!! Form::label('amount','Valor em R$:', ['class' => 'col-sm-2 control-label']) !!}
	
	{!! Form::text('amount', null, ['class' => 'form-control money']) !!}

	@if ($errors->has('amount')) <p class="autoClose alert alert-danger">{{ $errors->first('amount') }}</p> @endif

</div>

<div class="form-group">
	{!! Form::label('empresa_id', 'Empresa*:', ['class' => 'col-sm-2 control-label']) !!}
	
	@if(isset($empresas))
	 {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control']); !!}
	@endif

	@if ($errors->has('empresa_id')) <p class="autoClose alert alert-danger">{{ $errors->first('empresa_id') }}</p> @endif
	
</div>



<div class="form-group">
	{!! Form::label('obs', 'Observação:', ['class' => 'col-sm-2 control-label']) !!}
	
	{!! Form::text('obs', null, ['class' => 'form-control']) !!}

	@if ($errors->has('obs')) <p class="autoClose alert alert-danger">{{ $errors->first('obs') }}</p> @endif
	
</div>

<div class="form-group">
	{!! Form::label('status', 'Pago:', ['class' => 'control-label']) !!}
	{!! Form::checkbox('status') !!}
</div>

<div class="btn-group" role="group" aria-label="...">

		{!! Form::button('Voltar', array('class' => 'btn btn-default', 'onclick' => 'window.history.back()')) !!}
		
		{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}

</div>
