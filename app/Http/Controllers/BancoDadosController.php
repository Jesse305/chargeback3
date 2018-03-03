<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\BancoDados;

class BancoDadosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function bancos_dados()
    {

      $bancos_dados = BancoDados::all();

      return view('banco_dados.bancos_dados', [
        'bancos_dados' => $bancos_dados
      ]);
    }

    public function cadastro()
    {

      return view('banco_dados.cadastro');
    }

    public function duplicadoCad($data_base, $ip_host)
    {
      $count = BancoDados::where('data_base', $data_base)->where('ip_host', $ip_host)->count();
      return $count;
    }

    public function cadastrar(Request $request)
    {

      if($this->duplicadoCad($request->data_base, $request->ip_host)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'warning',
          'msg' => 'Já existe um banco de dados de nome '.$request->data_base.' no '.$request->ip_host
        ]);
      }

      Validator::make($request->all(), [
        'tipo' => 'required',
        'ambiente' => 'required',
        'ip_host' => 'required|min:7',
        'data_base' => 'required|min:5',
        'user' => 'required|min:4',
      ])->validate();

      $dados = $request->all();
      $banco_dados = new BancoDados($dados);

      if($banco_dados->save()){
        return redirect()
        ->route('bancos_dados')
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Cadastro Realizado com sucesso'
        ]);
      }

    }

    public function edicao(BancoDados $banco_dados)
    {

      return view('banco_dados.edicao', [
        'banco_dados' => $banco_dados
      ]);
    }

    public function duplicadoEd($id, $data_base)
    {
      $count = BancoDados::where('id', '<>', $id)->where('data_base', $data_base)->count();
      return $count;
    }

    public function editar(Request $request)
    {

      if($this->duplicadoEd($request->id, $request->data_base) || $this->duplicadoCad($request->date_base, $request->ip_host)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'warning',
          'msg' => 'Já existe um banco de dados de nome '.$request->data_base.' no '.$request->ip_host
        ]);
      }

      Validator::make($request->all(), [
        'tipo' => 'required',
        'ambiente' => 'required',
        'ip_host' => 'required|min:7',
        'data_base' => 'required|min:5',
        'user' => 'required|min:4',
      ])->validate();

      $banco_dados = BancoDados::findOrFail($request->id);
      $dados = $request->all();
      if($banco_dados->update($dados)){
        return redirect()
        ->route('bancos_dados')
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Cadastro alterado com sucesso'
        ]);
      }

    }

    public function excluir(Request $request){
      $banco_dados = BancoDados::findOrFail($request->id);

      if($banco_dados->delete()){

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Registro excluído com sucesso'
        ]);
      }
    }
}
