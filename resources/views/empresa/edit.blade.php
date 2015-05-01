@extends('layouts.master')

@section('title', 'Empresa')

@section('sidebar')
    @parent

@stop

@section('content')



	<h1>Editar Empresa :{!! $empresa->id !!}</h1>

	<hr/>


<div class="container">
	<div class="well row">	

	{!! Form::model($empresa,['method' => 'PATCH', 'action' => ['EmpresaController@update', $empresa->id], 'id' => 'form']) !!}

		@include('empresa._form',['submitButtonText'=>'Editar Empresa'])

	{!! Form::close() !!}

    </div>
</div>

	@include('errors.list')



@stop