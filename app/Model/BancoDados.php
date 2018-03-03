<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BancoDados extends Model
{
    protected $fillable = [
      'tipo', 'ambiente', 'ip_host', 'data_base', 'user', 'password', 'status'
    ];

    public function printTipo($tipo)
    {
      switch ($tipo) {
        case 1:
        return 'MySQL';
        break;

        case 2:
        return 'SQL Server';
        break;

        case 3:
        return 'Oracle';
        break;

        case 4:
        return 'PostgreSQL';
        break;

        case 5:
        return 'MongoDB';
        break;
      }
    }

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
          return 'Desenvolvimento';
          break;

          case 3:
          return 'Homologação';
          break;

          case 4:
          return 'Treinamento';
          break;

          case 5:
          return 'Produção';
          break;
      }
    }
}
