@extends('layouts.master')

@section('title', 'Bills')

@section('sidebar')
    @parent

@stop

@section('content')

	

	<h1>Editar Pagamento</h1>

	<hr/>


  <div class="container">
    <div class="well row">

    	{!! Form::model($bill, ['method' => 'PATCH', 'action' => ['BillController@update', $bill->id]]) !!}
    		@include ('bills._form', ['submitButtonText' => 'Salvar Agendamento'])
    	{!! Form::close() !!}
    	
    </div>
</div>

@include ('errors.list')

@stop