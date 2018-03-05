@extends('layouts.app')

@section('title', 'Ambiente')

@section('content')
<div class="container-fluid" style="margin-bottom: 100px;">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Detalhes do Ambiente</h4>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <table class="table table-bordered table-striped table-condensed">
      <tr>
        <th>Tipo de Ambiente:</th>
        <td>{{$ambiente->printAmbiente($ambiente->tipo_ambiente)}}</td>
      </tr>
      <tr>
        <th>Nome Sistema:</th>
        <td>{{$ambiente->sistema}}</td>
      </tr>
      <tr>
        <th>Host:</th>
        <td>{{$ambiente->host_ambiente}}</td>
      </tr>
      <tr>
        <th>Caminho:</th>
        <td>{{$ambiente->caminho}}</td>
      </tr>
      <tr>
        <th>URL:</th>
        <td>{{!empty($ambiente->url) ? $ambiente->url : 'Não Informado'}}</td>
      </tr>
      <tr>
        <th>Status:</th>
        <td>{{$ambiente->printStatus($ambiente->status)}}</td>
      </tr>
      <tr>
        <th>Data Cadastro:</th>
        <td>{{$ambiente->created_at->format('d/m/Y H:i')}}</td>
      </tr>
      <tr>
        <th>Ultima Atualização:</th>
        <td>{{$ambiente->updated_at->format('d/m/Y H:i')}}</td>
      </tr>
      <tr>
        <th>Descrição:</th>
        <td>{{!empty($ambiente->descricao) ? $ambiente->descricao : 'Não Informado'}}</td>
      </tr>
    </table>
    <button type="button" class="btn btn-default btn-sm" onclick="javascript: history.back();">Voltar</button>
    <a href="{{route('ambiente_edicao', $ambiente)}}" class="btn btn-warning btn-sm">Editar</a>
  </div>
</div>
@endsection
