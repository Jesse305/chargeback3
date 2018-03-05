<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $fillable = [
      'tipo_ambiente', 'sistema', 'host_ambiente', 'caminho', 'url', 'descricao', 'status'
    ];

    public function printStatus($status)
    {
      switch ($status) {
        case 1:
          return 'Ativo';
          break;

        default:
          return 'Inativo';
          break;
      }
    }

    public function printAmbiente($ambiente)
    {
      switch ($ambiente) {
          case 1:
          return 'Desenvolvimento';
          break;

          case 2:
          return 'Homologação';
          break;

          case 3:
          return 'Treinamento';
          break;

          case 4:
          return 'Produção';
          break;
      }
    }
}
