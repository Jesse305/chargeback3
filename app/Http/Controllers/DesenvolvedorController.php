<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Desenvolvedor;
use Illuminate\Support\Facades\Validator;

class DesenvolvedorController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function desenvolvedores()
    {
      return view('desenvolvedor.desenvolvedores', [
        'listaDevs' => Desenvolvedor::all()
      ]);
    }

    public function cadastro()
    {
      return view('desenvolvedor.cadastro');
    }

    public function cadastrar(Request $request)
    {
        $dados = $request->all();
        $validator = Validator::make($dados, [
          'nome' => 'required|min:3|unique:desenvolvedors',
          'ling_programacao' => 'required'
        ]);

        if($validator->fails()){
          return redirect()
          ->back()
          ->withErrors($validator)
          ->withInput();
        }
        else{
          $desenvolvedor = new Desenvolvedor([
            'nome' => $request->nome,
            'ling_programacao' => $request->ling_programacao,
            'ip' => $request->ip,
            'status' => 1
          ]);
          if($desenvolvedor->save()){
            return redirect()
            ->route('desenvolvedores')
            ->with('alerta', [
              'tipo' => 'success',
              'msg' => 'Cadastro realizado com sucesso'
            ]);
          }
        }
    }

    public function edicao(Request $request)
    {

      $desenv = Desenvolvedor::findOrFail($request->id);

      return view('desenvolvedor.edicao',[
        'desenv' => $desenv
      ]);
    }

    public function duplicidade($id, $nome)
    {
      $count = Desenvolvedor::where('id', '<>', $id)->where('nome', $nome)->count();

      return $count;
    }

    public function editar(Request $request)
    {
      if($this->duplicidade($request->id, $request->nome)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'warning',
          'msg' => 'Já existe um cadastro com nome '.$request->nome
        ]);
        exit;
      }

      Validator::make($request->all(), [
        'nome' => 'required|min:3',
        'ling_programacao' => 'required'
      ])->validate();

      $dados = $request->all();
      $desenv = Desenvolvedor::findOrFail($request->id);
      if($desenv->update($dados)){
        return redirect()
        ->route('desenvolvedores')
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Registro Alterado com sucesso'
        ]);
      }
    }

    public function excluir(Request $request)
    {
      $desenv = Desenvolvedor::findOrFail($request->id);
      if($desenv->delete()){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Registro Excluído com sucesso'
        ]);
      }
    }
}
