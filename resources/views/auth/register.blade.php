@extends('layouts.app')

@section('title', 'Cadastrar')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4>Cadastro de Usuário</h4>
                  </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="form_register">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">*Nome:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus max="255">

                                @if ($errors->has('name'))
                                    <span class="alert-erro">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="cpf" class="col-md-4 col-form-label text-md-right">*CPF:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control cpf" id="cpf" name="cpf" value="{{old('cpf')}}" required>
                            @if($errors->has('cpf'))
                              <span class="alert-erro">
                                <strong>{{$errors->first('cpf')}}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">*Endereço de e-mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required maxlength="255">

                                @if ($errors->has('email'))
                                    <span class="alert-erro">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">*Senha:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="alert-erro">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">*Confirma Senha:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="perfil" class="col-md-4 col-form-label text-md-right">*Perfil</label>
                          <div class="col-md-6">
                            <select class="form-control" name="perfil" id="perfil_user">
                              <option value="0">Selecione</option>
                              <option value="1" @if(old('perfil') == 1) selected @endif >Administrador</option>
                              <option value="2" @if(old('perfil') == 2) selected @endif >Usuário</option>
                            </select>
                            @if($errors->first('perfil_user'))
                              <span class="alert-erro">
                                <strong>{{$erros->first('perfil_user')}}</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-default btn-sm" onclick="javascript: history.back();">Voltar</button>
                                <button type="submit" class="btn btn-success btn-sm">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
