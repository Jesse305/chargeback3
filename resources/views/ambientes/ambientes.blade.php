@extends('layouts.app')

@section('title', 'Ambientes')

@section('content')
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>LISTA DE AMBIENTES</h4>
    </div>
  </div>
  <table class="table table-bordered table-condensed table-striped dtTable">
    <thead>
      <tr>
        <th>Ambiente:</th>
        <th>Nome Sistema:</th>
        <th>Host:</th>
        <th>Status:</th>
        <th width="120">Ação:</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ambientes as $amb)
      <tr>
        <td>{{$amb->printAmbiente($amb->tipo_ambiente)}}</td>
        <td>{{$amb->sistema}}</td>
        <td>{{$amb->host_ambiente}}</td>
        <td>{{$amb->printStatus($amb->status)}}</td>
        <td>
          <a href="{{route('ambiente_detalhes', $amb)}}" class="btn btn_visualizar white" title="Visualizar" id="" >
            <i class="glyphicon glyphicon-eye-open info"></i>
          </a>
          <a href="{{route('ambiente_edicao', $amb)}}" class="btn white" title="Editar">
            <i class="glyphicon glyphicon-edit warning"></i>
          </a>
          <button type="button" class="btn white" title="Excluir" onclick="excluir('{{route('ambiente_excluir', $amb->id)}}')">
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
