<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $fillable = [
      'nome', 'ling_programacao', 'ip', 'status',
    ];

}
