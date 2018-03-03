@extends('layouts.app')

@section('title', 'Bancos de Dados')

@section('content')
<div class="container-fluid">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>LISTA DE BANCOS DE DADOS</h4>
    </div>
  </div>
  <table class="table table-striped table-bordered table-condensed dtTable">
    <thead>
      <tr>
        <th>Tipo:</th>
        <th>Ambiente:</th>
        <th>Host:</th>
        <th>Banco:</th>
        <th>Status:</th>
        <th width="120">Ações:</th>
      </tr>
    </thead>

    <tbody>
      @foreach($bancos_dados as $bd)
      <tr>
        <td>{{$bd->printTipo($bd->tipo)}}</td>
        <td>{{$bd->printAmbiente($bd->ambiente)}}</td>
        <td>{{$bd->ip_host}}</td>
        <td>{{$bd->data_base}}</td>
        <td>{{$bd->printStatus($bd->status)}}</td>
        <td>
          <button type="button" class="btn btn_visualizar white" title="Visualizar" id="btn_visualizar" data-target="#modal_info" data-toggle="modal"
          data-user="{{$bd->user}}" data-password="{{$bd->password}}">
            <i class="glyphicon glyphicon-eye-open info"></i>
          </button>
          <a href="{{route('banco_dados_edicao', $bd)}}" class="btn white" title="Editar">
            <i class="glyphicon glyphicon-edit warning"></i>
          </a>
          <button type="button" class="btn white" title="Excluir" onclick="excluir('{{route('banco_dados_excluir', $bd->id)}}')">
            <i class="glyphicon glyphicon-remove danger"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- Modal -->
<div id="modal_info" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mais Informações</h4>
      </div>
      <div class="modal-body">

        <table>
          <tr>
            <th width="100">Usuário:</th>
            <td id="user"></td>
          </tr>
          <tr>
            <th>Senha:</th>
            <td id="password"></td>
          </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
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
