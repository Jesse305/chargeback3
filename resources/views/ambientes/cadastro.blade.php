@extends('layouts.app')

@section('title', 'Ambientes')

@section('content')
<div class="container-fluid" style="margin-bottom: 100px;">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>CADASTRO DE AMBIENTE DE SISTEMA</h4>
    </div>
  </div>
  <div class="col-md-6 col-md-offset-3">
    <form class="" action="{{route('ambiente_cadastrar')}}" method="post">
      @include('ambientes.form')
    </form>
  </div>
</div>
@endsection
