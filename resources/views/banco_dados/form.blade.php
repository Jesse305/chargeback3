@csrf

<div class="form-group">
  <label for="tipo">Tipo:</label>
  <select class="form-control" name="tipo" required>
    <option value="">Selecione</option>
    <option value="1" @if(old('tipo') == 1 || (isset($banco_dados) && $banco_dados->tipo == 1)) selected @endif>MySQL</option>
    <option value="2" @if(old('tipo') == 2 || (isset($banco_dados) && $banco_dados->tipo == 2)) selected @endif>SQL Server</option>
    <option value="3" @if(old('tipo') == 3 || (isset($banco_dados) && $banco_dados->tipo == 3)) selected @endif>Oracle</option>
    <option value="4" @if(old('tipo') == 4 || (isset($banco_dados) && $banco_dados->tipo == 4)) selected @endif>PostgreSQL</option>
    <option value="5" @if(old('tipo') == 5 || (isset($banco_dados) && $banco_dados->tipo == 5)) selected @endif>MongoDB</option>
  </select>
  @if($errors->has('tipo'))
  <span class="alert-erro">
    <strong>{{$errors->first('tipo')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="ambiente">Ambiente:</label>
  <select class="form-control" name="ambiente" required>
    <option value="">Selecione</option>
    <option value="1" @if(old('ambiente') == 1 || (isset($banco_dados) && $banco_dados->ambiente == 1)) selected @endif>Desenvolvimento</option>
    <option value="2" @if(old('ambiente') == 2 || (isset($banco_dados) && $banco_dados->ambiente == 2)) selected @endif>Homologação</option>
    <option value="3" @if(old('ambiente') == 3 || (isset($banco_dados) && $banco_dados->ambiente == 3)) selected @endif>Treinamento</option>
    <option value="4" @if(old('ambiente') == 4 || (isset($banco_dados) && $banco_dados->ambiente == 4)) selected @endif>Produção</option>
  </select>
  @if($errors->has('ambiente'))
  <span class="alert-erro">
    <strong>{{$errors->first('ambiente')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="ip_host">Host:</label>
  <input class="form-control ip" type="text" name="ip_host" value="{{old('ip_host', isset($banco_dados) ? $banco_dados->ip_host : '')}}"
  required placeholder="IP do Host">
  @if($errors->has('ip_host'))
  <span class="alert-erro">
    <strong>{{$errors->first('ip_host')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="data_base">Banco:</label>
  <input class="form-control" type="text" name="data_base" value="{{old('data_base', isset($banco_dados) ? $banco_dados->data_base : '')}}"
  required placeholder="Nome do Banco">
  @if($errors->has('data_base'))
  <span class="alert-erro">
    <strong>{{$errors->first('data_base')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="user">Usuário:</label>
  <input class="form-control" type="text" name="user" value="{{old('user', isset($banco_dados) ? $banco_dados->user : '')}}"
  required placeholder="Usuário do Banco">
  @if($errors->has('user'))
  <span class="alert-erro">
    <strong>{{$errors->first('user')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">Senha:</label>
  <input class="form-control" type="password" name="password" value="{{old('', isset($banco_dados) ? $banco_dados->password : '')}}" id="password_banco">
  <input class="revela_senha" type="checkbox" name="" value="" data-input_senha="password_banco"> Ver senha
  @if($errors->has('password'))
  <span class="alert-erro">
    <strong>{{$errors->first('password')}}</strong>
  </span>
  @endif
</div>

@if(isset($banco_dados))
<div class="form-group">
  <label for="">Status:</label>
  <label for="" class="radio-inline"> </label> <input type="radio" name="status" value="1"
  @if(old('status') == '1' || (isset($banco_dados) && $banco_dados->status == '1')) checked @endif> Ativo
  <label for="" class="radio-inline"> </label> <input type="radio" name="status" value="0"
  @if(old('status') == '0' || (isset($banco_dados) && $banco_dados->status == '0')) checked @endif> Inativo
</div>
@endif

<div class="" style="margin-top: 10px;">
  <button type="button" class="btn btn-default btn-sm" onclick="javascript: history.back();">Voltar</button>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
</div>
