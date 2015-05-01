@extends('layouts.master')

@section('title', 'Bills')

@section('sidebar')
    @parent

@stop

@section('content')

	

	<h1>Pagamentos Agendados</h1>

	<hr/>


  <div class="container">
    
    <div class="row">

        {!! Form::button('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo',['class' => 'btn btn-default', 'onclick' => "window.location='bill/create'"]) !!}

<?php
$buttonActive = Input::get('filter');
$activeOpen = '';
$activeClose = '';

if($buttonActive=='open' || is_null($buttonActive))
{
  $activeOpen = 'active';
}else{
  $activeClose = 'active';
}
?>

        <button class="btn btn-default <?=$activeOpen?>" onclick="window.location='?filter=open'"><span class="" aria-hidden="true"></span>À Pagar</button>
        <button class="btn btn-default <?=$activeClose?>" onclick="window.location='?filter=close'"><span class="" aria-hidden="true"></span>Pago</button>

        <div class="panel panel-default filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Agendamentos</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Data do Pagamento" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Valor" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Empresa" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Obs" disabled></th>
                        <th><input type="text" class="form-control status" placeholder="Status" disabled></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>


@foreach($bills as $bill)

                <tr class="{{ $bill->status=='Pago' ? 'default' : $bill->color }}">
                 <td><span>{{ $bill->payment_date }}</span></td>
                  <td>R$ {{ $bill->amount }}</td>
                  <td>{{ $bill->empresa->nome }}</td>
                  <td>{{ $bill->obs }}</td>
                  <td><span class="label label-primary">{{ $bill->status }}</span></td>
                  <td><button type="button" onclick="window.location='bill/{{ $bill->id }}/edit'" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> editar</button></td>
                </tr>
   @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

{!! $bills->render() !!}


@stop