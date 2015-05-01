@extends('layouts.master')

@section('title', 'Bills')

@section('sidebar')
    @parent

@stop

@section('content')

	

	<h1>Cadastrar Pagamento</h1>

	<hr/>


  <div class="container">
    <div class="well row">

	    {!! Form::open(['url' => 'bill']) !!}
	    	@include ('bills._form', ['submitButtonText' => 'Adicionar Agendamento'])
	    {!! Form::close() !!}

    </div>
</div>


@stop