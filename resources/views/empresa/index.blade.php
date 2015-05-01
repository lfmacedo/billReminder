@extends('layouts.master')

@section('title', 'Lista de Empresas')

@section('sidebar')
    @parent

@stop

@section('content')

	<h1>Lista de Empresas</h1>

	<hr/>

<div class="row">
  <div class="span12">
    <button onclick="window.location='{{ route("empresa.create") }}'" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova Empresa</button>
  </div>
</div>
<br>
<div class="well row">
@if(count($empresas) > 0)

  @include('empresa._search')
	
  <table class="table table-striped">
  
   <thead>
    <tr>
     <th>Nome</th><th>CNPJ</th><th>Fone</th><th>E-mail</th><th></th>
    </tr>
   </thead>
   
   <tbody>
    
     
     @foreach($empresas as $empresa)

   	<tr>
   		<td>{{ $empresa->nome }}</td><td><span data-mask="000.000.000/0000-00">{{ $empresa->cnpj }}</span></td><td><span data-mask="(00) 0000-0000">{{ $empresa->telefone }}</span></td><td>{{ $empresa->email }}</td>
   		<td><button onclick="window.location='{{ route('empresa.edit', [$empresa->id]) }}'" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> editar</button></td>
   	</tr>

     @endforeach
    

    
   </tbody>	
  
  </table>
</div>

  {{-- Paginacao --}}
  {!! $empresas->render() !!}

@else
 <p class="alert-warning text-center" style="padding: 8px;">Nenhuma empresa cadastrada</p>
@endif


@stop

