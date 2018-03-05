@csrf

<div class="form-group">
  <label for="">*Ambiente:</label>
  <select class="form-control" name="tipo_ambiente" required>
    <option value="">Selecione</option>
    <option value="1" @if(old('tipo_ambiente') == 1 || (isset($ambiente) && $ambiente->tipo_ambiente == 1)) selected @endif>Desenvolvimento</option>
    <option value="2" @if(old('tipo_ambiente') == 2 || (isset($ambiente) && $ambiente->tipo_ambiente == 2)) selected @endif>Homologação</option>
    <option value="3" @if(old('tipo_ambiente') == 3 || (isset($ambiente) && $ambiente->tipo_ambiente == 3)) selected @endif>Treinamento</option>
    <option value="4" @if(old('tipo_ambiente') == 4 || (isset($ambiente) && $ambiente->tipo_ambiente == 4)) selected @endif>Produção</option>
  </select>
  @if($errors->has('tipo_ambiente'))
  <span class="alerta_erro">
    <strong>{{$errors->first('tipo_ambiente')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">*Nome Sistema:</label>
  <input class="form-control" type="text" name="sistema" value="{{old('sistema', isset($ambiente) ? $ambiente->sistema : '')}}" required maxlength="100"
  onkeyup="maiuscula(this);">
  @if($errors->has('sistema'))
  <span class="alerta_erro">
    <strong>{{$errors->first('sistema')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">*Host:</label>
  <input class="form-control ip" type="text" name="host_ambiente" value="{{old('host_ambiente', isset($ambiente) ? $ambiente->host_ambiente : '')}}"
  placeholder="IP do Host(Servidor)" required>

  @if($errors->has('host_ambiente'))
  <span class="alerta_erro">
    <strong>{{$errors->first('host_ambiente')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">*Caminho:</label>
  <input class="form-control" type="text" name="caminho" value="{{old('caminho', isset($ambiente) ? $ambiente->caminho : '')}}" placeholder="Caminho no servidor" required>
  @if($errors->has('caminho'))
  <span class="alerta_erro">
    <strong>{{$errors->first('caminho')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">URL:</label>
  <input class="form-control" type="text" name="url" value="{{old('url', isset($ambiente->url) ? $ambiente->url : '')}}">
  @if($errors->has('url'))
  <span class="alerta_erro">
    <strong>{{$errors->first('url')}}</strong>
  </span>
  @endif
</div>

<div class="form-group">
  <label for="">Descrição:</label>
  <textarea class="form-control" name="descricao" rows="5" maxlength="200">{{old('descricao', isset($ambiente) ? $ambiente->descricao : '')}}</textarea>
</div>

<div class="">
  <button type="button" class="btn btn-default btn-sm" onclick="javascript: history.back();">Voltar</button>
  <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  Campos com <b>*</b> são obrigatórios.
</div>

<script type="text/javascript">
  function maiuscula(a){
    var b = a.value.toUpperCase();
    a.value = b;
  }
</script>
