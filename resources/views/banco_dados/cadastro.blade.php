@extends('layouts.app')

@section('title', 'Bancos de Dados')

@section('content')
<div class="container-fluid" style="margin-bottom: 100px;">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>CADASTRO DE BANCO DE DADOS</h4>
    </div>
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form class="" action="{{route('banco_dados_cadastrar')}}" method="post">
      @include('banco_dados.form')
    </form>
  </div>
</div>

@endsection
