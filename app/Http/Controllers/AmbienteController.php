<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ambiente;
use Illuminate\Support\Facades\Validator;

class AmbienteController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function ambientes()
    {
      $ambientes = Ambiente::all();
      return view('ambientes.ambientes', [
        'ambientes' => $ambientes
      ]);
    }

    public function detalhes(Ambiente $ambiente)
    {

      return view('ambientes.detalhes', [
        'ambiente' => $ambiente
      ]);
    }

    public function cadastro()
    {
      return view('ambientes.cadastro');
    }

    public function validaCad($ambiente, $nome_sistema, $host)
    {

      $count = Ambiente::where('tipo_ambiente', $ambiente)->where('sistema', $nome_sistema)->where('host_ambiente', $host)->count();
      return $count;
    }

    public function validaForm($dados)
    {
      return Validator::make($dados->all(),[
        'tipo_ambiente' => 'required',
        'sistema' => 'required|min:3',
        'host_ambiente' => 'required|min:7',
        'caminho' => 'required'
      ])->validate();
    }

    public function cadastrar(Request $request)
    {

      if($this->validaCad($request->tipo_ambiente, $request->sistema, $request->host_ambiente)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'warning',
          'msg' => 'Sistema não permite cadastro duplicado'
        ]);
      }

      $this->validaForm($request);

      $ambiente = new Ambiente($request->all());
      if($ambiente->save()){
        return redirect()
        ->route('ambientes')
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Cadastro realizado com sucesso'
        ]);
      }
    }

    public function edicao(Ambiente $ambiente)
    {

      return view('ambientes.edicao', [
        'ambiente' => $ambiente
      ]);
    }

    public function validaEd($id, $sistema, $tipo_ambiente)
    {

      $count = Ambiente::where('id', '<>', $id)
      ->where('sistema', $sistema)
      ->where('tipo_ambiente', $tipo_ambiente)
      ->count();
      return $count;
    }

    public function editar(Request $request, Ambiente $ambiente)
    {

        if($this->validaEd($ambiente->id, $request->sistema, $request->tipo_ambiente)){
          return redirect()
          ->back()
          ->withInput()
          ->with('alerta', [
            'tipo' => 'warning',
            'msg' => 'Sistema não permite cadastro duplicado'
          ]);
        }

        $this->validaForm($request);

        if($ambiente->update($request->all())){
          return redirect()
          ->route('ambientes')
          ->with('alerta', [
            'tipo' => 'success',
            'msg' => 'Cadastro editado com sucesso'
          ]);
        }

    }

    public function excluir(Request $request)
    {
      $ambiente = Ambiente::findOrFail($request->id);
      if($ambiente->delete()){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'msg' => 'Cadastro excluído com sucesso'
        ]);
      }
    }
}
