@extends('layouts.app')

@section('title', 'Edição de Desenvolvedor')

@section('content')
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>EDIÇÃO DE CADASTRO DE DESENVOLVEDOR</h4>
    </div>
  </div>
</div>
<div class="col-md-6 col-md-offset-3">
  <form class="" action="{{route('desenvolvedor_editar', $desenv->id)}}" method="post">
    @include('desenvolvedor.form')
    <div class="">
      <button type="button" class="btn btn-default btn-sm" onclick="javascript: history.back();">Voltar</button>
      <button type="submit" class="btn btn-success btn-sm">Salvar</button>
    </div>
  </form>
</div>
@endsection
