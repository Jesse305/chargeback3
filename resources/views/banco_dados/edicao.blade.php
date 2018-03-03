@extends('layouts.app')

@section('title', 'Bancos de Dados')

@section('content')
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>EDIÇÃO DE CADASTRO DE BANCO DE DADOS</h4>
    </div>
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form class="" action="{{route('banco_dados_editar', $banco_dados->id)}}" method="post">
      @include('banco_dados.form')
    </form>
  </div>
</div>
@endsection
