@extends('layouts.app')
@section('title', 'Desenvolvedores')
@section('content')
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>LISTA DE DESENVOLVEDORES</h4>
    </div>
  </div>
  <table class="table table-striped table-bordered table-condensed dtTable">
    <thead>
      <tr>
        <th>Nome:</th>
        <th>Linguagem de Programação:</th>
        <th>IP máquina de Desenvolvimento:</th>
        <th>Status:</th>
        <th align="center">Ações:</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listaDevs as $dev)
      <tr>
        <td>{{$dev->nome}}</td>
        <td>{{$dev->ling_programacao}}</td>
        <td>@if($dev->ip == null) Não Informado @else {{$dev->ip}} @endif </td>
        <td>@if($dev->status == 1) Ativo @else Inativo @endif</td>
        <td>
          <a href="{{route('desenvolvedor_edicao', $dev->id)}}" class="btn white" title="Editar">
            <i class="glyphicon glyphicon-edit warning"></i>
          </a>
          <button type="button" class="btn white" title="Excluir" onclick="excluir('{{route('desenvolvedor_excluir', $dev->id)}}');">
            <i class="glyphicon glyphicon-remove danger"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

<script type="text/javascript">
  function excluir(_href){
    swal({
      title: 'Tem certeza?',
      text: "Deseja realmente excluir o registro!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, excluir!',
      cancelButtonText: 'Não, cancelar'
    }).then((result) => {
      if (result.value) {
        window.location.href= _href;
      }
    });
  }
</script>
