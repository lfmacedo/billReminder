@extends('layouts.master')

@section('title', 'Empresa')

@section('sidebar')
    @parent

@stop

@section('content')

	<h1>Cadastrar Empresa</h1>

	<hr/>

<div class="container">
    <div class="well row">

	{!! Form::open(['url' => 'empresa', 'id' => 'form']) !!}

		@include('empresa._form',['submitButtonText'=>'Criar Empresa'])

	{!! Form::close() !!}

    </div>
</div>

@stop