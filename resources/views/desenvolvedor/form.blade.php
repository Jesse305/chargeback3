@csrf <br>
<input type="hidden" name="id" value="@if(isset($desenv)) {{$desenv->id}} @endif">
<div class="form-group">
  <label for="nome" >*Nome:</label>
  <input class="form-control" type="text" name="nome" value="{{old('nome', isset($desenv) ? $desenv->nome : '')}}" id="nome" maxlength="200" required autofocus >
  @if($errors->has('nome'))
    <span class="alerta_erro">
      <strong>{{$errors->first('nome')}}</strong>
    </span>
  @endif
</div>
<div class="form-group">
  <label for="ling_programacao">*Linguagem de Programação:</label>
  <select class="form-control" name="ling_programacao" id="ling_programacao" required>
    <option value="">Selecione</option>
    <option value="JAVA" @if(old('ling_programacao') == 'JAVA' || (isset($desenv) && $desenv->ling_programacao == 'JAVA'))selected @endif>JAVA</option>
    <option value="PHP" @if(old('ling_programacao') == 'PHP' || (isset($desenv) && $desenv->ling_programacao == 'PHP'))selected @endif>PHP</option>
    <option value="MOBILE" @if(old('ling_programacao') == 'MOBILE' || (isset($desenv) && $desenv->ling_programacao == 'MOBILE'))selected @endif>MOBILE</option>
  </select>
  @if($errors->has('ling_programacao'))
    <span class="alerta_erro">
      <strong>{{$errors->first('ling_programacao')}}</strong>
    </span>
  @endif
</div>
<div class="form-group">
  <label for="ip">IP da Máquina de Desenvolvimento:</label>
  <input class="form-control ip" type="text" name="ip" value="{{old('ip', isset($desenv) ? $desenv->ip : '')}}" id="ip">
  @if($errors->has('ip'))
    <span class="alerta_erro">
      <strong>{{$errors->first('ip')}}</strong>
    </span>
  @endif
  @if(isset($desenv))
  <div class="form-group" style="margin-top: 10px;">
    <label for="status">Status:</label>
    <label for="" class="radio-inline"> <input type="radio" name="status" value="1"
      @if(old('status') == '1' || (isset($desenv) && $desenv->status == '1')) checked @endif> Ativo
    </label>
    <label for="" class="radio-inline"> <input type="radio" name="status" value="0"
      @if(old('status') == '0' || (isset($desenv) && $desenv->status == '0')) checked @endif> Inativo 
    </label>
  </div>
  @endif
</div>
